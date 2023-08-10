@extends('layouts.admin')

@section('stylesheet')
  <!-- DataTables -->

  <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css"/>

  <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css"/>

@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <section class="panel">

            <div class="text-center">
                <span class="btn btn-sm btn-primary btn-add" style="cursor: pointer"
                 title="Delete"><i class="fa fa-plus-circle">
                    <span> Add Slider <span class="pull-right"></span> </span></i></span>
            </div>

              <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModel"
              aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h4>Add Slider</h4>
               </div>
               <div class="modal-body">
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Slider Name <span class="text-danger">*</span></label>
                          <input type="text" name="title" placeholder="title" value="{{ old('title') }}"
                                 class="form-control @error('title') is-invalid @enderror" required>
                          
                          @error('title')
                          <strong class="text-danger">{{ $errors->first('title') }}</strong>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Sub Title<span class="text-danger">*</span></label>
                          <input type="text" name="sub_title" placeholder="sub_title No" value="{{ old('sub_title') }}"
                                 class="form-control @error('sub_title') is-invalid @enderror" required>
                          @error('sub_title')
                          <strong class="text-danger">{{ $errors->first('sub_title') }}</strong>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 mt-2">
                        <div class="form-group">
                          <label class="control-label">Slider Slug <span class="text-danger">*</span></label>
                          <input type="text" name="slug" placeholder="slug" value="{{ old('slug') }}"
                                 class="form-control @error('slug') is-invalid @enderror" required>
                          
                          @error('slug')
                          <strong class="text-danger">{{ $errors->first('slug') }}</strong>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Image <label class="text-danger">*</label></label>
                            <input type="file" name="image"  placeholder="Slider image" value="{{ old('image') }}"
                                   class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Status<span class="text-danger">*</span></label>
                          <select name="status" required class="form-control @error('status') is-invalid @enderror">
                            <option value="">Choose a statue</option>
                            @foreach(\App\Models\Slider::$statusArrays as $statys)
                              <option value="{{ $statys }}"
                                      @if(old('status') == $statys) selected @endif>{{ ucfirst($statys) }}</option>
                            @endforeach
                          </select>
                          @error('status')
                          <strong class="text-danger">{{ $errors->first('status') }}</strong>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label class="control-label">Product Details</label>
                              <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                              @error('description')
                              <strong class="text-danger">{{ $errors->first('description') }}</strong>
                              @enderror
                          </div>
                      </div>
                  </div>

                    <div class="row mt-4">
                      <div class="col-sm-12 text-right">
                        <div class="modal-footer">
                        <button class="btn btn-danger btn-sm" type="submit">Submit</button>
                    </div>
                      </div>
                    </div>
                  </form>


               </div>



             </div>
           </div>
         </div>




            <header class="panel-heading mt-5">
              <h2 class="panel-title">List of Slider</h2>

            </header>
            <div class="panel-body">
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              {{--  @if(\App\Helper\CustomHelper::canView('Create User', 'Super Admin'))
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                    <a href="{{ route('slider.create') }}" class="brn btn-success btn-sm">Create new Slider</a>
                  </div>
                </div>
              @endif  --}}
              {{--<table class="table table-bordered table-striped mb-none" id="data-table">--}}
              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                     cellspacing="0" width="100%" style="font-size: 14px">

                <thead>
                <tr>
                  <th width="10">#</th>
                  <th>Slider Name</th>
                  <th>Slider Slug</th>
                  <th>Image</th>
                  <th width="200">Created At</th>
                  <th width="50">Status</th>
                  @if(\App\Helper\CustomHelper::canView('Manage User|Delete User', 'Super Admin'))
                    <th class="hidden-phone" width="40">Option</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $val)
                  <tr class="@if(($key%2) == 0)gradeX @else gradeC @endif">
                    <td class="p-1">{{ ($key+1) }}</td>
                    <td class="p-1 text-capitalize">{{ $val->title }}</td>
                    <td class="p-1">{{ $val->slug }}</td>
                    <td class="p-1"><img src="{{ asset($val->image) }}" style="height: 50px;"></td>
                    <td width="200" class="p-1">{{ date('F d, Y h:i A', strtotime($val->created_at)) }}</td>



                    @if(\App\Helper\CustomHelper::canView('Manage User', 'Super Admin'))
                    <td class="text-capitalize p-1" width="100">
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                   @if($val->status == \App\Models\Slider::$statusArrays[0])
                                       checked
                                   @endif
                                   data-id="{{ $val->id }}"
                                   id="myonoffswitch{{ ($key+1) }}">
                            <label class="onoffswitch-label" for="myonoffswitch{{ ($key+1) }}">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </td>
                    {{--  @else
                      <td class="p-1 text-capitalize">{{ $val->status }}</td>
                    @endif  --}}
                    @endif

                    @if(\App\Helper\CustomHelper::canView('Manage User|Delete User', 'Super Admin'))
                      <td class="center hidden-phone p-1" width="100">
                        {{--  @if(\App\Helper\CustomHelper::canView('Manage User', 'Super Admin'))
                          
                              <span class="btn btn-sm btn-success btn-manage delete_{{ $val->id }}" style="cursor: pointer"
                                data-id="{{ $val->id }}" title="Delete"><i
                              class="fa fa-edit"></i></span>
                        @endif  --}}
                        @if(\App\Helper\CustomHelper::canView('Manage User', 'Super Admin'))
                        <a href="{{ route('slider.manage', $val->id) }}" class="btn btn-sm btn-success" title="Edit"> <i
                            class="fa fa-edit"></i> </a>
                      @endif
                        @if(\App\Helper\CustomHelper::canView('Delete User', 'Super Admin'))
                          <span class="btn btn-sm btn-danger btn-delete delete_{{ $val->id }}" style="cursor: pointer"
                                data-id="{{ $val->id }}" title="Delete"><i
                              class="fa fa-trash-o"></i></span>
                        @endif
                      </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{--  <div class="row">
                <div class="col-sm-12">{{ $data->links() }}</div>
              </div>  --}}
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
          <h4>Delete Slider</h4>
        </div>
        <div class="modal-body">
          <strong>Are you sure to delete this Slider?</strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-success btn-sm yes-btn">Yes</button>
        </div>
      </div>
    </div>
  </div>





<div class="modal fade" id="manageModel" tabindex="-1" role="dialog" aria-labelledby="manageModel"
              aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h4>Update Slider</h4>
               </div>
               <div class="modal-body">
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <input type="hidden" name="id" value="{{ $slider->id ?? "" }}">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label">Slider Name<span class="text-danger">*</span></label>
                        <input type="text" name="title" placeholder="Name" required value="{{ $slider->title ?? ""}}"
                               class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <strong class="text-danger">{{ $errors->first('title') }}</strong>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label">Sub title<span class="text-danger">*</span></label>
                        <input type="text" name="sub_title" placeholder="Email" required value="{{ $slider->sub_title ?? ""}}"
                               class="form-control @error('sub_title') is-invalid @enderror">
                        @error('sub_title')
                        <strong class="text-danger">{{ $errors->first('sub_title') }}</strong>
                        @enderror
                      </div>
                    </div>
                  </div>
  
  
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label">Slug<span class="text-danger">*</span></label>
                        <input type="text" name="slug" placeholder="Name" required value="{{ $slider->slug ?? ""}}"
                               class="form-control @error('slug') is-invalid @enderror">
                        @error('slug')
                        <strong class="text-danger">{{ $errors->first('slug') }}</strong>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label class="control-label">Image <label
                                  class="text-danger">*</label></label>
                          <input type="file" name="image" placeholder="Slider image"
                                 value="{{ old('image', $slider->image ?? "") }}"
                                 class="form-control @error('image') is-invalid @enderror">
                          @error('image')
                          <strong class="text-danger">{{ $errors->first('image') }}</strong>
                          @enderror
                      </div>
                  </div>
                  </div>
  
  
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="control-label">Status<span class="text-danger">*</span></label>
                        <select name="status" required class="form-control @error('status') is-invalid @enderror">
                          <option value="">Choose a status</option>
                          @foreach(\App\Models\Slider::$statusArrays as $status)
                            <option value="{{ $status ?? ""}}"
                                    @if(old('status', $slider->status ?? "") == $status) selected @endif>{{ ucfirst($status) }}</option>
                          @endforeach
                        </select>
                        @error('status')
                        <strong class="text-danger">{{ $errors->first('status') }}</strong>
                        @enderror
                      </div>
                    </div>
                  </div>
  
  
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      rows="5">{{ old('description', $slider->description ?? "") }}</textarea>
                            @error('description')
                            <strong class="text-danger">{{ $errors->first('description') }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
  
  
  
                  <div class="row mt-4">
                    <div class="col-sm-12 text-right">
                      <button class="btn btn-danger btn-sm" type="submit">Submit</button>
                    </div>
                  </div>
                </form>


               </div>



             </div>
           </div>
         </div>







  
@endsection


@section('script')
  <!-- Required datatable js -->
  <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Buttons examples -->
  <script src="{{ asset('assets/admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/buttons.colVis.min.js') }}"></script>
  <!-- Responsive examples -->
  <script src="{{ asset('assets/admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>


  <script>

    $(document).ready(function () {
       $('#datatable-buttons').DataTable();

      // var table = $('#datatable-buttons').DataTable({
      //   lengthChange: false,
      //   buttons: ['copy', 'excel', 'pdf', 'colvis']
      // });
      //
      // table.buttons().container()
      //   .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');


      $(document).on('change', 'input[name="onoffswitch"]', function () {
        var status = 'inactive';
        var id = $(this).data('id')
        var isChecked = $(this).is(":checked");
        if (isChecked) {
          status = 'active';
        }
        $.ajax({
          url: "{{ route('ajax.update.slider.status') }}",
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
          url: "{{ route('slider.destroy') }}",
          method: "delete",
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


      $(document).on('click', '.btn-add', function () {
        $('#addModel').modal('show')
      });


      $(document).on('click', '.btn-manage', function () {
        var id = $(this).data('id');
        
        var url = '{{ route("slider.manage", ":id") }}';
        url = url.replace(':id', id);
        

  $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Populate the modal with the retrieved data
                $('#sliderId').val(response.id);
                $('#sliderTitle').val(response.title);
                $('#sliderSubTitle').val(response.sub_title);
                // Populate other fields accordingly

                // Show the modal
                $('#manageModel').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle the error if necessary
                console.log(error);
            }
        });
    });

      });

  </script>
  
@endsection
