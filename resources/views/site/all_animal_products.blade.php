@extends('layouts.site')
@section('stylesheet')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
      .panel{
          padding: 0px 0px !important;
      }
      .panel-heading{
          padding: 10px 0px;
          background-color: rgb(16,38,74);
          color: white;
          border-radius: 5px;
      }
      .btn-job-list{
          background-color: rgb(16,38,74);
          color: white;
      }
      .btn-job-list:hover{
          background-color: #0D6EFD;
          color: white;
      }
      .center {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 50%;
      }
      img {
          max-width: 100%;
          height: auto;
      }

      .product-list-img {
          width: 100px;
          min-height: 100px;
          max-height: auto;
          float: left;
          margin: 3px;
          padding: 3px;
      }
  </style>

@endsection

@section('content')


<!-- Breadcrumb Area Start -->
<div class="section breadcrumb-area bg-bright">
    <div class="container">
        <div class="row">
            <div class="text-center col-12">
                <div class="breadcrumb-wrapper">
                    
                    <h2 class="breadcrumb-title">All Products</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Shop Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!--shop toolbar start-->
                <div class="p-2 mb-8 border shop_toolbar_wrapper flex-column flex-md-row">

                    <!-- Shop Top Bar Left start -->
                    <div class="shop-top-bar-left">

                        <div class="shop_toolbar_btn">
                            <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i class="ti-layout-grid4-alt"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="ti-align-justify"></i></button>
                        </div>
                        <div class="shop-top-show">
                            <span>Showing 1–12 of 39 results</span>
                        </div>

                    </div>
                    <!-- Shop Top Bar Left end -->

                    <!-- Shopt Top Bar Right Start -->
                    <div class="shop-top-bar-right">

                        <h4 class="title me-2">Short By: </h4>
                        <!-- Header Action Search Button Start -->
                           
                            <!-- Search Form and Button Start -->
                            <form class="header-search-form" action="#">
                                <input type="text" class="header-search-input" placeholder="Search Our Store">
                                <button class="header-search-button"><i class="icon-magnifier icons"></i></button>
                            </form>
                            <!-- Search Form and Button End -->

                        <!-- Header Action Search Button End -->

                        {{--  <div class="shop-short-by">
                            <select class="nice-select" aria-label=".form-select-sm example">
                                <option selected>Short by Default</option>
                                <option value="1">Short by Popularity</option>
                                <option value="2">Short by Rated</option>
                                <option value="3">Short by Latest</option>
                                <option value="3">Short by Price</option>
                                <option value="3">Short by Price</option>
                            </select>
                        </div>  --}}
                    </div>
                    <!-- Shopt Top Bar Right End -->

                </div>
                <!--shop toolbar end-->

                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_4">

                    

@foreach ($animal as $val)
    

                    <!-- Single Product Start -->
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                        <div class="product-inner">
                            <div class="thumb">
                                <a href="single-product.html" class="image">
                                    <img class="fit-image" style="height: 270px; width: 270px;" src="{{asset($val->image)}}" alt="Product" />
                                </a>
                                <div class="action-wrapper">
                                    <a id="{{ $val->id }}" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                    {{--  <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="ti-heart"></i></a>  --}}
                                    <a class="add-to-cart-btn action cart" data-animal-id="{{ $val->id }} title="Cart"><i class="ti-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="{{ route('animal_details', $val->name) }}">{{$val->name}}</a></h5>
                                {{--  <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>  --}}
                                <span class="price">
                                    @if ($val->discount_price == null)
                                    <span class="new">${{ $val->selling_price }}</span>
                                    @else
                                    <span class="new">${{ $val->discount_price }}</span>
                                    <span class="old">${{$val->selling_price}}</span>
                                    @endif
                                </span>
                                <p>{{$val->description}}</p>
                                <!-- Cart Button Start -->
                                <div class="cart-btn action-btn">
                                    <div class="action-cart-btn-wrapper d-flex">
                                        <div class="add-to_cart">
                                            <a class="add-to-cart-btn btn btn-primary btn-hover-dark rounded-0" data-animal-id="{{ $val->id }} href="cart.html">Add to cart</a>
                                        </div>
                                        {{--  <a href="wishlist.html" title="Wishlist" class="action"><i class="ti-heart"></i></a>  --}}
                                        <a href="#/" id="{{ $val->id }}" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quickview"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                                <!-- Cart Button End -->
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->

                    @endforeach


                </div>
                <!-- Shop Wrapper End -->

                <!--shop toolbar start-->
                <div class="mt-10 shop_toolbar_wrapper justify-content-center">

                    <!-- Shopt Top Bar Right Start -->
                    <div class="shop-top-bar-right">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link active" href="#/">1</a></li>
                                <li class="page-item"><a class="page-link" href="#/">2</a></li>
                                <li class="page-item"><a class="page-link" href="#/">3</a></li>
                                <li class="page-item">
                                    <a class="page-link rounded-0" href="#/" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Shopt Top Bar Right End -->

                </div>
                <!--shop toolbar end-->

            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->






@endsection

@section('script')
<!-- Datatable js -->
{{--      <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>--}}
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
{{--      <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>--}}
{{--      <script src="{{ asset('assets/admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>--}}
{{--      <script src="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>--}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script>
      <script type="text/javascript">
        $(document).ready(function () {
          $('#datatable').DataTable();
        });
      </script>
@endsection