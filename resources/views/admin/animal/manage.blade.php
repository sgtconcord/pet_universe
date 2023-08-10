@extends('layouts.admin')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Manage animal</h2>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="mb-3 text-right col-lg-12 col-md-12 col-xl-12">
                                <a href="{{ route('animal.list') }}" class="brn btn-success btn-sm">Animal List</a>
                            </div>
                        </div>
                        @if (session()->has('status'))
                        {!! session()->get('status') !!}
                        @endif

                        <form action="{{ route('animal.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $animal->id }}">

                            


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">animal Name</label>
                                        <input type="text" name="name" placeholder="Slider name"
                                               value="{{ old('name', $animal->name) }}"
                                               class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Stock Quantity</label>
                                        <input type="text" name="stock_quantity"
                                               placeholder="animal stock quantity"
                                               value="{{ old('stock_quantity', $animal->stock_quantity) }}"
                                               class="form-control @error('stock_quantity') is-invalid @enderror">
                                        @error('stock_quantity')
                                        <strong class="text-danger">{{ $errors->first('stock_quantity') }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Category<span class="text-danger">*</span></label>
                                        <select name="category_id" required class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="">Choose a category Status</option>
                                            @foreach($category as $e)
                                                <option value="{{ $e->id }}" @if(old('category_id->id', $animal->category->category_name) == $e->category_name) selected @endif>{{ ucfirst($e->category_name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <strong class="text-danger">{{ $errors->first('category_id') }}</strong>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Sub Category<span class="text-danger">*</span></label>
                                        <select name="subcategory_id" required class="form-control @error('subcategory_id') is-invalid @enderror">
                                            <option value="">Choose a category Status</option>
                                            @foreach($subcategory as $e)
                                                <option value="{{ $e->id }}" @if(old('subcategory_id->id', $animal->subcategory->subcategory_name) == $e->subcategory_name) selected @endif>{{ ucfirst($e->subcategory_name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                        <strong class="text-danger">{{ $errors->first('subcategory_id') }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Featured<span
                                                class="text-danger">*</span></label>
                                        <select name="featured" required
                                                class="form-control @error('featured') is-invalid @enderror">
                                            <option value="">Choose a featured</option>
                                            @foreach (\App\Models\Animal::$featuredArrays as $statys)
                                            <option value="{{ $statys }}"
                                                    @if (old(
                                            'featured', $animal->featured) == $statys) selected @endif>
                                            {{ ucfirst($statys) }}</option>
                                            @endforeach
                                        </select>
                                        @error('featured')
                                        <strong class="text-danger">{{ $errors->first('featured') }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Todays Deal<span
                                                class="text-danger">*</span></label>
                                        <select name="today_deal" required
                                                class="form-control @error('today_deal') is-invalid @enderror">
                                            <option value="">Choose a today_deal</option>
                                            @foreach (\App\Models\Animal::$todayDealArrays as $statys)
                                            <option value="{{ $statys }}"
                                                    @if (old(
                                            'today_deal', $animal->today_deal) == $statys) selected @endif>
                                            {{ ucfirst($statys) }}</option>
                                            @endforeach
                                        </select>
                                        @error('today_deal')
                                        <strong class="text-danger">{{ $errors->first('today_deal') }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Image <label
                                                class="text-danger">*</label></label>
                                        <input type="file" name="image" placeholder="Slider image"
                                               value="{{ old('image', $animal->image) }}"
                                               class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-2 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Status<span class="text-danger">*</span></label>
                                        <select name="status" required
                                                class="form-control @error('status') is-invalid @enderror">
                                            <option value="">Choose a status</option>
                                            @foreach (\App\Models\Animal::$statusArrays as $statys)
                                            <option value="{{ $statys }}"
                                                    @if (old(
                                            'status', $animal->status) == $statys) selected @endif>
                                            {{ ucfirst($statys) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                        <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                               

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Pickuppoint<span class="text-danger">*</span></label>
                                        <select name="pickup_point_id" required class="form-control @error('pickup_point_id') is-invalid @enderror">
                                            <option value="">Choose a category Status</option>
                                            @foreach($pickuppoint as $e)
                                                <option value="{{ $e->id }}" @if(old('pickup_point_id->id', $animal->pickuppoint->pickup_point_name) == $e->pickup_point_name) selected @endif>{{ ucfirst($e->pickup_point_name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('pickup_point_id')
                                        <strong class="text-danger">{{ $errors->first('pickup_point_id') }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Purchase Price</label>
                                        <input type="text" name="purchase_price"
                                               placeholder="animal purchase_price"
                                               value="{{ old('purchase_price', $animal->purchase_price) }}"
                                               class="form-control @error('purchase_price') is-invalid @enderror">
                                        @error('purchase_price')
                                        <strong class="text-danger">{{ $errors->first('purchase_price') }}</strong>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                            

                            


       


                            

                            


                            <div class="row">
                                

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Selling Price</label>
                                        <input type="text" name="selling_price"
                                               placeholder="animal selling_price"
                                               value="{{ old('selling_price', $animal->selling_price) }}"
                                               class="form-control @error('selling_price') is-invalid @enderror">
                                        @error('selling_price')
                                        <strong class="text-danger">{{ $errors->first('selling_price') }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Discount Price</label>
                                        <input type="text" name="discount_price"
                                               placeholder="animal discount_price"
                                               value="{{ old('discount_price', $animal->discount_price) }}"
                                               class="form-control @error('discount_price') is-invalid @enderror">
                                        @error('discount_price')
                                        <strong class="text-danger">{{ $errors->first('discount_price') }}</strong>
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
                                                  rows="5">{{ old('description', $animal->description) }}</textarea>
                                        @error('description')
                                        <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>





                            <div class="mt-4 row">
                                <div class="text-right col-sm-12">
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
<script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            tags: true,
        })
    })
</script>

<script>
    $('select[name="category_id"]').change(function () {
        const $this = $('select[name="subcategory_id"]')
        var idCategory = this.value;
        $this.html('');
        $.ajax({
          url: "{{url('api/fetch-subcategory')}}/" + idCategory,
          type: "GET",
          dataType: 'json',
          success: function (result) {
            $this.html('<option value="">Choose a sub category</option>');
            $.each(result.subcategories, function (key, value) {
              $this.append('<option value="' + value
                .id + '">' + value.subcategory_name + '</option>');
            });
          }
        });
      });
  </script>




@endsection
