@extends('layouts.admin')

@section('stylesheet')
    
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <section class="panel m-5">
                <header class="panel-heading">
                  <h2 class="panel-title ">Upload Image For Login Slider</h2>
                </header>
                @if (session()->has('status'))
                    {!! session()->get('status')!!}               
                @endif
            <div class="card-body">
                <form action="{{route('admin.backgroundImage')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label for="backgroudImage" class="control-label">Upload Image <span class="text-danger">(Dimensions: 880 * 680)</span></label>
                                            <input class="form-control" type="file" name="image" required placeholder="slider image" value="{{old('image')}}" id="" @error('image') is-invalid @enderror>
                                            @error('image')
                                            <strong class="text-danger">{{ $errors->first('image') }}</strong> 
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="control-label">Status<span class="text-danger">*</span></label>
                                            <select name="status" required class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Choose a status</option>
                                                @foreach(\App\Models\LoginSlider ::$statusArray as $status)
                                                    <option value="{{ $status }}"
                                                            @if(old('status') == $status) selected @endif>{{ ucfirst($status) }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-danger btn-sm" type="submit">Submit</button>
                            </div>
                        </div>
                       </div>
                    
                </form>
            </div>
            </section>
        </div>
    </div>
</div>

{{-- list --}}
<div class="row mt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <section class="panel">
            <header class="panel-heading">
              <h2 class="panel-title">Background Image List</h2>
            </header>
            <div class="panel-body">
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif
              @if(\App\Helper\CustomHelper::canView('Create Training Type', 'Super Admin'))
                
              @endif
              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                     cellspacing="0" width="100%" style="font-size: 14px">

                <thead>
                <tr>
                  <th width="50">#</th>
                  <th>Name</th>
                  <th width="50">Status</th>
                  @if(\App\Helper\CustomHelper::canView('Manage Background|Delete Background Image', 'Super Admin'))
                    <th class="hidden-phone" width="40">Option</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @foreach($images as $key => $val)
                  <tr class="@if(($key%2) == 0)gradeX @else gradeC @endif">
                    <td class="p-1">{{ ($key+1) }}</td>
                    <td class="p-1 text-capitalize">{{ $val->image }}</td>
                    @if(\App\Helper\CustomHelper::canView('Manage Background', 'Super Admin'))
                          <td class="text-capitalize p-1" width="100">
                              <div class="onoffswitch">
                                  <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                         @checked($val->status == \App\Models\LoginSlider::$statusArray[0])
                                         data-id="{{ $val->id }}"
                                         id="myonoffswitch{{ ($key+1) }}">
                                  <label class="onoffswitch-label" for="myonoffswitch{{ ($key+1) }}">
                                      <span class="onoffswitch-inner"></span>
                                      <span class="onoffswitch-switch"></span>
                                  </label>
                              </div>
                          </td>
                      @else
                          <td class="p-1 text-capitalize">{{ $val->status }}</td>
                      @endif
                      @if(\App\Helper\CustomHelper::canView('Manage Background|Delete Background', 'Super Admin'))
                      <td class="center hidden-phone p-1" width="100">

                          @if(\App\Helper\CustomHelper::canView('Delete Background', 'Super Admin'))
                            <span class="btn btn-sm btn-danger btn-delete delete_{{ $val->id }}" style="cursor: pointer"
                                  data-id="{{ $val->id }}"><i class="fa fa-trash-o"></i></span>
                          @endif
                      </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="userDeleteModal"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Delete Image</h4>
        </div>
        <div class="modal-body">
          <strong>Are you sure to delete this Image?</strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-success btn-sm yes-btn">Yes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
  $(document).ready(function () {


$(document).on('change', 'input[name="onoffswitch"]', function () {
  var status = 'inactive';
  var id = $(this).data('id')
  var isChecked = $(this).is(":checked");
  if (isChecked) {
    status = 'active';
  }
  $.ajax({
    url: "{{ route('ajax.update.backgroundImage.status') }}",
    method: "post",
    dataType: "html",
    data: {'id': id, 'status': status},
    success: function (data) {
      if (data === "success") {
      }
    }
  });
})

$(document).on('click', '.yes-btn', function () {
        var pid = $(this).data('id');
        var $this = $('.delete_' + pid)
        $.ajax({
          url: "{{ route('admin.backgroundImage.destroy') }}",
          method: "DELETE",
          dataType: "html",
          data: {id: pid},
          success: function (data) {
            if (data === "success") {
              $('#userDeleteModal').modal('hide')
              $this.closest('tr').css('background-color', 'red').fadeOut();
            }
          }
        });
      })
      $(document).on('click', '.btn-delete', function () {
        var pid = $(this).data('id');
        $('.yes-btn').data('id', pid);
        $('#userDeleteModal').modal('show')
      });
})
</script>
@endsection