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
              <h2 class="panel-title">Manage Slider</h2>
            </header>
            <div class="panel-body">
              @if(\App\Helper\CustomHelper::canView('List Of User', 'Super Admin'))
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('slider.list') }}" class="brn btn-success btn-sm">List of Slider</a>
                </div>
              </div>
              @endif
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <input type="hidden" name="id" value="{{ $slider->id }}">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Slider Name<span class="text-danger">*</span></label>
                      <input type="text" name="title" placeholder="Name" required value="{{ $slider->title }}"
                             class="form-control @error('title') is-invalid @enderror">
                      @error('title')
                      <strong class="text-danger">{{ $errors->first('title') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Sub title<span class="text-danger">*</span></label>
                      <input type="text" name="sub_title" placeholder="Email" required value="{{ $slider->sub_title }}"
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
                      <input type="text" name="slug" placeholder="Name" required value="{{ $slider->slug }}"
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
                               value="{{ old('image', $slider->image) }}"
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
                          <option value="{{ $status }}"
                                  @if(old('status', $slider->status) == $status) selected @endif>{{ ucfirst($status) }}</option>
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
                                    rows="5">{{ old('description', $slider->description) }}</textarea>
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
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
@endsection
