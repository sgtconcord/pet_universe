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
              <h2 class="panel-title">Manage Sub Category</h2>
            </header>
            <div class="panel-body">
              @if(\App\Helper\CustomHelper::canView('List Of User', 'Super Admin'))
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('subcategory.list') }}" class="brn btn-success btn-sm">List of Sub Category</a>
                </div>
              </div>
              @endif
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              <form action="{{ route('subcategory.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <input type="hidden" name="id" value="{{ $subcategory->id }}">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Sub Category Name<span class="text-danger">*</span></label>
                      <input type="text" name="subcategory_name" placeholder="Name" required value="{{ $subcategory->subcategory_name }}"
                             class="form-control @error('subcategory_name') is-invalid @enderror">
                      @error('subcategory_name')
                      <strong class="text-danger">{{ $errors->first('subcategory_name') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Sub Category Slug<span class="text-danger">*</span></label>
                      <input type="text" name="subcategory_slug" placeholder="Email" required value="{{ $subcategory->subcategory_slug }}"
                             class="form-control @error('subcategory_slug') is-invalid @enderror">
                      @error('subcategory_slug')
                      <strong class="text-danger">{{ $errors->first('subcategory_slug') }}</strong>
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
                            @foreach(\App\Models\Categories::$statusArrays as $status)
                              <option value="{{ $status }}"
                                      @if(old('status', $categories->category_id) == $status) selected @endif>{{ ucfirst($status) }}</option>
                            @endforeach
                          </select>
                          @error('status')
                          <strong class="text-danger">{{ $errors->first('status') }}</strong>
                          @enderror
                        </div>
                      </div>
                    </div>



                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Status<span class="text-danger">*</span></label>
                      <select name="status" required class="form-control @error('status') is-invalid @enderror">
                        <option value="">Choose a status</option>
                        @foreach(\App\Models\SubCategory::$statusArrays as $status)
                          <option value="{{ $status }}"
                                  @if(old('status', $subcategory->status) == $status) selected @endif>{{ ucfirst($status) }}</option>
                        @endforeach
                      </select>
                      @error('status')
                      <strong class="text-danger">{{ $errors->first('status') }}</strong>
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
