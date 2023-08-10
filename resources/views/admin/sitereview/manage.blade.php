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
              <h2 class="panel-title">Manage Review</h2>
            </header>
            <div class="panel-body">
              @if(\App\Helper\CustomHelper::canView('List Of User', 'Super Admin'))
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('sitereview.list') }}" class="brn btn-success btn-sm">List of Review</a>
                </div>
              </div>
              @endif
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              <form action="{{ route('sitereview.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <input type="hidden" name="id" value="{{ $sitereview->id }}">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" placeholder="Name" required value="{{ $sitereview->name }}"
                             class="form-control @error('name') is-invalid @enderror">
                      @error('name')
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @enderror
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Image <label
                                class="text-danger">*</label></label>
                        <input type="file" name="image" placeholder="Review image"
                               value="{{ old('image', $sitereview->image) }}"
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
                      <label class="control-label">Designation<span class="text-danger">*</span></label>
                      <input type="text" name="designation" placeholder="Email" required value="{{ $sitereview->designation }}"
                             class="form-control @error('designation') is-invalid @enderror">
                      @error('designation')
                      <strong class="text-danger">{{ $errors->first('designation') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>


              


                {{--  <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="control-label">Status<span class="text-danger">*</span></label>
                      <select name="status" required class="form-control @error('status') is-invalid @enderror">
                        <option value="">Choose a status</option>
                        @foreach(\App\Models\Review::$statusArrays as $status)
                          <option value="{{ $status }}"
                                  @if(old('status', $sitereview->status) == $status) selected @endif>{{ ucfirst($status) }}</option>
                        @endforeach
                      </select>
                      @error('status')
                      <strong class="text-danger">{{ $errors->first('status') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>  --}}


                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label class="control-label">Comment</label>
                          <textarea name="comment"
                                    class="form-control @error('comment') is-invalid @enderror"
                                    rows="5">{{ old('comment', $sitereview->comment) }}</textarea>
                          @error('comment')
                          <strong class="text-danger">{{ $errors->first('comment') }}</strong>
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
