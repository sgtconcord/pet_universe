@extends('layouts.site')
@section('stylesheet')
@endsection

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-bright">
        <div class="container">
            <div class="row">
                <div class="text-center col-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Checkout</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-margin">
        @if (session()->has('status'))
            <div style="text-align: center; color: green">
                {!! session()->get('status') !!}
            </div>
        @endif
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <!-- Cart Table Start -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->



                            <tbody>
                                @foreach ($cartItems as $val)
                                    <tr>

                                        <td class="pro-thumbnail"><a href="#"><img style="height: 50px; width: 50px"
                                                    class="fit-image" src="{{ asset($val->options->image) }}"
                                                    alt="Product" /></a></td>
                                        <td class="pro-title"><a
                                                href="{{ route('animal_details', $val->name) }}">{{ $val->name }}</a>
                                        </td>
                                        <td class="pro-price"><span>{{ $val->price }}</span></td>
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="{{ $val->qty }}"
                                                        type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>${{ $val->subtotal }}</span></td>
                                        <form action="{{ route('shopping.remove', $val->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            {{--  <input type="hidden" value="{{ $val->rowId }}" name="rowId">  --}}
                                            <td class="pro-remove"><button href="#"><i class="ti-trash"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach


                            </tbody>
                            <!-- Table Body End -->

                        </table>
                    </div>
                    <!-- Cart Table End -->

                    <!-- Cart Button Start -->
                    <div class="cart-button-section mb-n4">

                        <!-- Cart Button left Side Start -->
                        <div class="mb-4 cart-btn-lef-side">
                            <a href="{{ route('home') }}" class="btn btn-gray-deep btn-hover-primary">Continue
                                Shopping</a>
                            {{--  <a href="#" class="btn btn-gray-deep btn-hover-primary">Update Shopping Cart</a>  --}}
                        </div>
                        <!-- Cart Button left Side End -->

                        <!-- Cart Button Right Side Start -->
                        <div class="mb-4 cart-btn-right-right">
                            <a href="{{route('paymentCheckout')}}" class="btn btn-gray-deep btn-hover-primary">Proceed To Checkout</a>
                        </div>
                        <!-- Cart Button Right Side End -->

                    </div>
                    <!-- Cart Button End -->

                </div>
            </div>

            {{--  <div class="mt-10 row">
                <div class="col-lg-6 me-0 ms-auto">

                    <!-- Cart Calculation Area Start -->
                    <div class="cart-calculator-wrapper">

                        <!-- Cart Calculate Items Start -->
                        <div class="cart-calculate-items">

                            <!-- Cart Calculate Items Title Start -->
                            <h3 class="title">Cart Totals</h3>
                            <!-- Cart Calculate Items Title End -->

                            <!-- Responsive Table Start -->
                            <div class="table-responsive">

                                <table class="table">

                                    <tr>
                                        <td>Sub Total</td>
                                        <td>${{ Cart::total() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$70</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">$300</td>
                                    </tr>

                                </table>

                            </div>
                            <!-- Responsive Table End -->

                        </div>
                        <!-- Cart Calculate Items End -->

                        <!-- Cart Checktout Button Start -->
                        <a href="{{route('paymentCheckout')}}" class="mt-6 btn btn-gray-deep btn-hover-primary">Proceed To Checkout</a>
                        <!-- Cart Checktout Button End -->

                    </div>
                    <!-- Cart Calculation Area End -->

                </div>
            </div>  --}}

        </div>
    </div>
    <!-- Shopping Cart Section End -->
@endsection

@section('script')
    <script src="https://cdnjs .cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        //store coupon ajax call
        $('#add_to_cart').submit(function(e) {
            e.preventDefault();
            $('.loading').removeClass('d-none');
            var url = $(this).attr('action');
            var request = $(this).serialize();
            $.ajax({
                url: url,
                type: 'post',
                async: false,
                data: request,
                success: function(data) {
                    toastr.success(data);
                    $('#add_to_cart')[e].reset();
                    $('.loading').addClass('d-none');
                }
            });
        });
    </script>
@endsection
