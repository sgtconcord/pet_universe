@extends('layouts.asset')
@section('stylesheet')

@endsection

<button class="btn close" data-bs-dismiss="modal">×</button>

            <div class="row">
              
                <div class="col-md-6 col-12">

                    <!-- Product Details Image Start -->
                    <div class="modal-product-carousel">

                        <!-- Single Product Image Start -->
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <a class="swiper-slide" href="#">
                                    <img class="w-100" style="height: 470px; width: 470px;" src="{{asset($animal->image)}}" alt="Product">
                                </a>
                                @foreach ($animal_files as $val)

                                <a class="swiper-slide" href="#">
                                    <img class="w-100" src="{{asset($val->file)}}" alt="Product">
                                </a>
                                @endforeach
                              
                            </div>

                            <!-- Swiper Pagination Start -->
                            <!-- <div class="swiper-pagination d-md-none"></div> -->
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div class="swiper-product-button-next swiper-button-next"><i class="ti-arrow-right"></i></div>
                            <div class="swiper-product-button-prev swiper-button-prev"><i class="ti-arrow-left"></i></div>
                            <!-- Next Previous Button End -->
                        </div>
                        <!-- Single Product Image End -->

                    </div>
                    <!-- Product Details Image End -->

                </div>
                
                
                <div class="col-md-6 col-12 overflow-hidden position-relative">
                    {{--  <form action="{{route('add.to.cart')}}" method="post" id="add_cart_form">  --}}
                        <input type="hidden" value="{{ $animal->id }}" name="id">
                                                    <input type="hidden" animalvalue="{{ $animal->name }}" name="name">
                        {{--  @csrf   --}}
                        {{--  <input type="hidden" value="{{ $animal->id }}" name="id">
                        <input type="hidden" animalue="{{ $animal->name }}" name="nameanimal">  --}}
                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">

                        <!-- Product Head Start -->
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{$animal->name}}</h2>
                        </div>
                        <!-- Product Head End -->

                        {{--  <!-- Rating Start -->
                        <span class="rating justify-content-start mb-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <i class="fa fa-star-o"></i>
                    </span>
                        <!-- Rating End -->  --}}
                       

                        <!-- Price Box Start -->
                        <div class="price-box mb-2">
                            @if ($animal->discount_price == null)
                            <span class="regular-price">${{ $animal->selling_price }}</span>
                            @else
                            <span class="regular-price">${{ $animal->discount_price }}</span>
                            <span class="old-price"><del>${{ $animal->selling_price }}</del></span>
                            @endif
                        </div>
                        <!-- Price Box End -->
                   

                        <!-- SKU Start -->
                        <div class="sku mb-3">
                            <span>SKU: 12345</span>
                        </div>
                        <!-- SKU End -->

                        <!-- Product Inventory Start -->
                        <div class="product-inventroy mb-3">
                            <span class="inventroy-title"> <strong>Availability:</strong></span>
                            <span class="inventory-varient">12 Left in Stock</span>
                        </div>
                        <!-- Product Inventory End -->

                        <!-- Description Start -->
                        <p class="desc-content mb-5">{{$animal->description}}</p>
                        <!-- Description End -->
                        
                            
                        <!-- Quantity Start -->
                        <div class="quantity d-flex align-items-center justify-content-start mb-5">
                            <span class="me-2"><strong>Qty: </strong></span>
                            <div class="cart-plus-minus">
                               
                                <input class="cart-plus-minus-box" name="qty" value="1">
                                
                                <div class="dec qtybutton"></div>
                                <div class="inc qtybutton"></div>
                            </div>
                        </div>
                        <!-- Quantity End -->
                        

                        <!-- Cart Button Start -->
                        <div class="cart-btn action-btn mb-6">
                            <div class="action-cart-btn-wrapper d-flex justify-content-start">
                                <div class="add-to_cart">
                                    <a class="add-to-cart-btn btn btn-primary btn-hover-dark rounded-0" data-animal-id="{{ $animal->id }} href="cart.html">Add to cart</a>
                                </div>
                                <a href="wishlist.html" title="Wishlist" class="action"><i class="ti-heart"></i></a>
                            </div>
                        </div>
                        <!-- Cart Button End -->

                        <!-- Social Shear Start -->
                        <div class="social-share">
                            <div class="widget-social justify-content-center mb-6">
                                <a title="Twitter" href="#/"><i class="icon-social-twitter"></i></a>
                                <a title="Instagram" href="#/"><i class="icon-social-instagram"></i></a>
                                <a title="Linkedin" href="#/"><i class="icon-social-linkedin"></i></a>
                                <a title="Skype" href="#/"><i class="icon-social-skype"></i></a>
                                <a title="Dribble" href="#/"><i class="icon-social-dribbble"></i></a>
                            </div>
                        </div>
                        <!-- Social Shear End -->

                        <!-- Payment Option Start -->
                        <div class="payment-option mt-4 d-flex justify-content-start">
                            <span><strong>Payment: </strong></span>
                            <a href="#">
                                <img class="fit-image ms-1" src="{{asset('assets/site/images/payment/payment_large.png')}}" alt="Payment Option Image">
                            </a>
                        </div>
                        <!-- Payment Option End -->

                    </div>
                    <!-- Product Summery End -->
                    {{--  </form>  --}}
                </div>
            
                
            </div>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            // Listen for the click event on the 'Add to Cart' button
            $(".add-to-cart-btn").click(function() {
                // Get the animal ID from the data attribute
                var animalId = $(this).data("animal-id");
    
                // Make the AJAX request to add the item to the cart
                $.ajax({
                    url: "/shopping/cartlist",
                    type: "POST",
                    data: {
                        id: animalId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        const items = $('#cart-count').text();
                        console.log(parseInt(items)+1)
                        $('#cart-count').text(parseInt(items)+1);
                        // Handle the successful response with SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            timer: 3000, // Display time (in milliseconds)
                            timerProgressBar: true, // Show a progress bar
                        });
                        // You can also update the cart count or show the updated cart content dynamically
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occurred during the AJAX request with SweetAlert
                        if (xhr.status === 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Animal not found. Unable to add to cart.',
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while adding the product to cart.',
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    }
                });
            });
        });
    </script>
        
        