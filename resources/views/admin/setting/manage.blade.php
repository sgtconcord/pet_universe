@extends('layouts.admin')

@section('stylesheet')
@endsection



@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <section class="panel">
            <header class="panel-heading">
              <h2 class="panel-title">Manage Setting</h2>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('setting.list') }}" class="brn btn-success btn-sm">List of Settting</a>
                </div>
              </div>

              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif
              <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <label class="control-label">Key<span class="text-danger">*</span></label>
                    <select id="model-value-parent"  name="key" required class="form-control @error('key') is-invalid @enderror">
                      <option value="">Choose a Key</option>
                      @foreach(\App\Models\Setting::$keyArray as $key)
                        <option id="model-value" value="{{ $key }}"
                                @selected(old('key', $setting->key) == $key)>{{ ucfirst($key) }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-sm-12 d-none" id="logo">
                    <div class="form-group">
                      <label class="control-label">Image <label class="text-danger">*</label></label>
                      <input type="file" name="image" disabled required placeholder="Slider image" value="{{ old('image') }}"
                             class="form-control @error('image') is-invalid @enderror">
                      @error('image')
                      <strong class="text-danger">{{ $errors->first('image') }}</strong>
                      @enderror
                    </div>
                  </div>

                  <div class="col-sm-12 " id="defaultValue">
                    <div class="form-group">
                      <label class="control-label">Value <span class="text-danger">*</span></label><br>
                      <textarea name="value" required class="form-control @error('value') is-invalid @enderror" id="" cols="40" rows="3" placeholder="Description">{{ old('value', $setting->value) }}</textarea>

                      @error('value')
                      <strong class="text-danger">{{ $errors->first('value') }}</strong>
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
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
  <script>
    $(document).ready(function () {
      $('#model-value-parent').change(function () {
        checked($(this).val())
      })
      checked($('#model-value-parent').val())
      function checked($val) {
        const logo = $('input[name="image"]')
        const textarea = $('textarea[name="value"]')
        if($val == 'logo'){
          $('#logo').removeClass('d-none')
          $('#defaultValue').addClass('d-none')
          logo.removeAttr('disabled', '')
          textarea.attr('disabled', 'true')
        }else{
          $('#defaultValue').removeClass('d-none')
          $('#logo').addClass('d-none')
          textarea.removeAttr('disabled', '')
          logo.attr('disabled', 'true')
        }
      }
    })
  </script>
@endsection
