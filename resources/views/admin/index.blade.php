@extends('layouts.admin')

@section('stylesheet')
  <style>
    .mini-stat{
        -webkit-box-shadow: -6px 6px 15px 3px rgba(0,0,0,0.8);
        box-shadow: -6px 6px 15px 3px rgba(0,0,0,0.8);
    }
    .mini-stat:hover{
        -webkit-transform: translateY(-8px);
        transform: translateY(-8px);
        transition-duration: 0.5s;
    }
  </style>

@endsection
@section('content')
  <div class="container-fluid">

    @if(auth()->user()->hasAnyRole(\Spatie\Permission\Models\Role::find(3)))
      <div class="user-category">
          <span>{{__('common.category_'.auth()->user()->category)}}</span>
          {{--  <h1>Arman</h1>  --}}
      </div>
    @endif
{{--    <div class="row">--}}
{{--      <div class="col-md-12">--}}
{{--        <h3>Order</h3>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-purple"><i class="mdi mdi-basket"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-purple">{{ $order->pending }}</span>--}}
{{--            Pending--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-blue-grey"><i class="mdi mdi-black-mesa"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-blue-grey">{{ $order->processing }}</span>--}}
{{--            Processing--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-brown"><i class="mdi mdi-buffer"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $order->awaitingShipment }}</span>--}}
{{--            Awaiting Shipment--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-blue-grey"><i class="mdi mdi-barley"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $order->delivered }}</span>--}}
{{--            Delivered--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-dark"><i class="mdi mdi-airballoon"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $order->completed }}</span>--}}
{{--            Completed--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-indigo"><i class="mdi mdi-yeast"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $order->cancelled }}</span>--}}
{{--            Cancelled--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-lime"><i class="mdi mdi-water"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $order->total }}</span>--}}
{{--            Total--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--    </div>--}}

{{--    <div class="row">--}}
{{--      <div class="col-md-12">--}}
{{--        <h3>Product</h3>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-purple"><i class="mdi mdi-basket"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-purple">{{ $product->active }}</span>--}}
{{--            Active--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-blue-grey"><i class="mdi mdi-black-mesa"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-blue-grey">{{ $product->inactive }}</span>--}}
{{--            Inactive--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-brown"><i class="mdi mdi-buffer"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $product->total }}</span>--}}
{{--            Total--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--      <div class="col-md-12">--}}
{{--        <h3>Category</h3>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-purple"><i class="mdi mdi-basket"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-purple">{{ $category->active }}</span>--}}
{{--            Active--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-blue-grey"><i class="mdi mdi-black-mesa"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-blue-grey">{{ $category->inactive }}</span>--}}
{{--            Inactive--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-brown"><i class="mdi mdi-buffer"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $category->total }}</span>--}}
{{--            Total--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--      <div class="col-md-12">--}}
{{--        <h3>Sub-Category</h3>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-purple"><i class="mdi mdi-basket"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-purple">{{ $subCategory->active }}</span>--}}
{{--            Active--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-blue-grey"><i class="mdi mdi-black-mesa"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-blue-grey">{{ $subCategory->inactive }}</span>--}}
{{--            Inactive--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-brown"><i class="mdi mdi-buffer"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $subCategory->total }}</span>--}}
{{--            Total--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--      <div class="col-md-12">--}}
{{--        <h3>Brand</h3>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-purple"><i class="mdi mdi-basket"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-purple">{{ $brand->active }}</span>--}}
{{--            Active--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-blue-grey"><i class="mdi mdi-black-mesa"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-blue-grey">{{ $brand->inactive }}</span>--}}
{{--            Inactive--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="col-md-6 col-lg-6 col-xl-3">--}}
{{--        <div class="clearfix bg-white mini-stat">--}}
{{--          <span class="float-right mr-0 mini-stat-icon bg-brown"><i class="mdi mdi-buffer"></i></span>--}}
{{--          <div class="mini-stat-info">--}}
{{--            <span class="counter text-brown">{{ $brand->total }}</span>--}}
{{--            Total--}}
{{--          </div>--}}
{{--          <div class="clearfix"></div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

  </div><!-- container -->
@endsection


@section('script')

@endsection
