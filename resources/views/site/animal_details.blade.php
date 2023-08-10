
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
                    <h2 class="breadcrumb-title">Variable Product</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Variable Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Single Product Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2">

                <!-- Product Details Image Start -->
                <div class="product-details-img">

                    <!-- Single Product Image Start -->
                    <div class="single-product-img swiper-container product-gallery-top">
                        <div class="swiper-wrapper popup-gallery">
                            <a class="swiper-slide w-100" href="{{asset($animal->image)}}">
                                <img class="w-100" style="height: 470px; width: 470px;" src="{{asset($animal->image)}}" alt="Product">
                            </a>
                            @foreach ($animal_files as $val)
                            <a class="swiper-slide w-100" href="{{asset($val->file)}}">
                                <img class="w-100" src="{{asset($val->file)}}" alt="Product">
                            </a>
                            @endforeach
                            
                        </div>
                    </div>
                    <!-- Single Product Image End -->

                    <!-- Single Product Thumb Start -->
                    <div class="single-product-thumb swiper-container product-gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset($animal->image)}}" alt="Product">
                            </div>
                            @foreach ($animal_files as $val)
                            <div class="swiper-slide">
                                <img src="{{asset($val->file)}}" alt="Product">
                            </div>
                            @endforeach
                            
                            
                        </div>

                        <!-- Next Previous Button Start -->
                        <div class="swiper-button-next swiper-nav-button"><i class="ti-arrow-right"></i></div>
                        <div class="swiper-button-prev swiper-nav-button"><i class="ti-arrow-left"></i></div>
                        <!-- Next Previous Button End -->

                    </div>
                    <!-- Single Product Thumb End -->

                </div>
                <!-- Product Details Image End -->

            </div>

            <div class="col-lg-7">

                <!-- Product Summery Start -->
                <div class="product-summery position-relative">

                    <!-- Product Head Start -->
                    <div class="mb-3 product-head">
                        <h2 class="product-title">{{$animal->name}}</h2>
                    </div>
                    <!-- Product Head End -->

                    <div style="display: flex">
                    <!-- Rating Start -->
                        <span class="mb-2 rating justify-content-start">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                        <!-- Rating End -->
                        <h5>({{$totalreview}} Custommer Review)</h5>
                    </div>

                    <!-- Price Box Start -->
                    <div class="mb-2 price-box">
                        @if ($animal->discount_price == null)
                        <span class="regular-price">${{ $animal->selling_price }}</span>
                        @else
                        <span class="regular-price">${{ $animal->discount_price }}</span>
                        <span class="old-price"><del>${{ $animal->selling_price }}</del></span>
                        @endif
                    </div>
                    <!-- Price Box End -->

                    <!-- SKU Start -->
                    <div class="mb-3 sku">
                        <span>SKU: 12345</span>
                    </div>
                    <!-- SKU End -->

                    <!-- Product Inventory Start -->
                    <div class="mb-3 product-inventroy">
                        <span class="inventroy-title"> <strong>Availability:</strong></span>
                        <span class="inventory-varient">12 Left in Stock</span>
                    </div>
                    <!-- Product Inventory End -->

                    <!-- Description Start -->
                    <p class="mb-5 desc-content">{{$animal->description}}</p>
                    <!-- Description End -->

                    {{--  <!-- Product Coler Variation Start -->
                    <div class="mb-5 product-color-variation">
                        <span> <strong>Color: </strong></span>
                        <button type="button" class="btn bg-danger"></button>
                        <button type="button" class="btn bg-primary"></button>
                        <button type="button" class="btn bg-dark"></button>
                        <button type="button" class="btn bg-light"></button>
                    </div>
                    <!-- Product Coler Variation End -->

                    <!-- Product Size Start -->
                    <div class="mb-4 product-size">
                        <span><strong>Size :</strong></span>
                        <a href="#" class="size-ratio active">s</a>
                        <a href="#" class="size-ratio">m</a>
                        <a href="#" class="size-ratio">l</a>
                        <a href="#" class="size-ratio">xl</a>
                    </div>
                    <!-- Product Size End -->

                    <!-- Product Material Start -->
                    <div class="mb-5 product-material">
                        <span><strong>Material :</strong></span>
                        <a href="#" class="active">Metal</a>
                        <a href="#">Resin</a>
                        <a href="#">Fibre</a>
                        <a href="#">Iron</a>
                    </div>
                    <!-- Product Material End -->  --}}

                    <!-- Quantity Start -->
                    <div class="mb-5 quantity d-flex align-items-center">
                        <span class="me-2"><strong>Qty: </strong></span>
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" value="1" type="text">
                            <div class="dec qtybutton"></div>
                            <div class="inc qtybutton"></div>
                        </div>
                    </div>
                    <!-- Quantity End -->

                    <!-- Cart Button Start -->
                    <div class="mb-6 cart-btn action-btn">
                        <div class="action-cart-btn-wrapper d-flex">
                            <div class="add-to_cart">
                                <a class="add-to-cart-btn btn btn-primary btn-hover-dark rounded-0" data-animal-id="{{ $animal->id }} href="cart.html">Add to cart</a>
                            </div>
                            {{--  <a href="wishlist.html" title="Wishlist" class="action"><i class="ti-heart"></i></a>  --}}
                        </div>
                    </div>
                    <!-- Cart Button End -->

                    {{--  <!-- Single Product Buy Button Start -->
                    <div class="mb-6 single-product-buy">
                        <a href="checkout.html" class="btn btn-primary btn-hover-dark rounded-0">Buy it Now</a>
                    </div>
                    <!-- Single Product Buy Button End -->  --}}

                    <!-- Social Shear Start -->
                    <div class="social-share mb-n7">
                        <div class="mb-6 widget-social justify-content-start">
                            <a title="Twitter" href="#/"><i class="icon-social-twitter"></i></a>
                            <a title="Instagram" href="#/"><i class="icon-social-instagram"></i></a>
                            <a title="Linkedin" href="#/"><i class="icon-social-linkedin"></i></a>
                            <a title="Skype" href="#/"><i class="icon-social-skype"></i></a>
                            <a title="Dribble" href="#/"><i class="icon-social-dribbble"></i></a>
                        </div>
                    </div>
                    <!-- Social Shear End -->

                </div>
                <!-- Product Summery End -->

            </div>

        </div>
    </div>
</div>
<!-- Single Product Section End -->

<!-- Single Product Tab Start -->
<div class="section section-padding bg-bright">
    <div class="container">
        <div class="row">

            <!-- Single Product Tab Start -->
            <div class="col-lg-12 single-product-tab">
                <ul class="nav nav-tabs mb-n3" id="myTab" role="tablist">
                    <li class="mb-3 nav-item">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                    </li>
                    <li class="mb-3 nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
                    </li>
                    <li class="mb-3 nav-item">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Shipping Policy</a>
                    </li>
                    <li class="mb-3 nav-item">
                        <a class="nav-link" id="review-tab" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Size Chart</a>
                    </li>
                </ul>

                <div class="tab-content mb-text" id="myTabContent">
                    <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                        <div class="desc-content">
                            <p class="mb-3">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
                            <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- Start Single Content -->
                        <div class="p-3 mt-8 border product_tab_content">

                            



                            <form id="data-form">
                                {{--  <form action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">  --}}

                                @csrf
                                <input type="hidden" name="animal_id" value="{{$animal->id}}">

                            <!-- Rating Wrap Start -->
                            <div class="rating_wrap">
                                <h5 class="mb-2 rating-title">Add a review </h5>
                                <p class="mb-2">Your email address will not be published. Required fields are marked *</p>



                                
                                    <div class="form-group mb--40">
                                       
                                        
                                        <p class="mt-3 mb-2">This will be how your name will be displayed in the account section and in reviews</p>
                                    </div>
                               







                                {{--  <!-- Rating Start -->
                                <span class="mb-3 rating justify-content-start">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                <!-- Rating End -->  --}}

                            </div>
                            <!-- Rating Wrap End -->

                            <!-- Comments ans Replay Start -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    <div class="col-lg-12 ">

                                        <!-- Comment form Start -->
                                        <form action="#" class="comment-form-area">
                                            <div class="row comment-input">

                                                <div class="mb-3 col-md-6 comment-form-author">
                                                <label>Select a rating</label>
                                                <select name="rating" class="myniceselect nice-select wide rounded-0" style="background-color:#f4f4f4">
                                                    <option selected value="">Select a rating here</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                </div>

                                                {{--  <!-- Input Name Start -->
                                                <div class="mb-3 col-md-6 comment-form-author">
                                                    <label>Name</label>
                                                    <input type="text" required="required" name="name">
                                                </div>
                                                <!-- Input Name End -->  --}}

                                                <!-- Input Email Start -->
                                                <div class="mb-3 col-md-6 comment-form-emai">
                                                    <label>Email</label>
                                                    <input type="text" required="required" name="email">
                                                </div>
                                                <!-- Input Email End -->

                                            </div>
                                            <!-- Comment Texarea Start -->
                                            <div class="mb-3 comment-form-comment">
                                                <label>Comment</label>
                                                <textarea class="comment-notes" required="required" name="comment"></textarea>
                                            </div>
                                            <!-- Comment Texarea End -->

                                            <!-- Comment Submit Button Start -->
                                            <div class="comment-form-submit">
                                                <button type="submit" id="submit" class="border-0 btn btn-primary btn-hover-dark">Submit</button>
                                            </div>
                                            <!-- Comment Submit Button End -->

                                        </form>
                                        <!-- Comment form End -->

                                    </div>
                                </div>
                            </div>
                            <!-- Comments ans Replay End -->
</form>
                        
                        <!-- End Single Content -->



                        <h6 class="mt-5 mb-2 rating-sub-title">Animal Ratings</h6>

                        @guest
                        <h4 style="color: red">Please Login first if you see the reviews</h4>

                        @else

                        @foreach ($review as $val )

                        <!-- Start Single Review -->
                            <div class="mb-4 single-review d-flex">

                                <!-- Review Thumb Start -->
                                <div class="review_thumb">
                                    <img alt="review images" src="{{asset('assets/site/images/review/1.jpg')}}">
                                </div>
                                <!-- Review Thumb End -->

                                <!-- Review Details Start -->
                                <div class="review_details">
                                    <div class="mb-2 review_info">

                                        <!-- Rating Start -->
                                        <span class="mb-3 rating justify-content-start">
                                            @if($val->rating=='1')
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                @elseif ($val->rating=='2')
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                @elseif ($val->rating=='3')
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                @elseif ($val->rating=='4')
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                @elseif ($val->rating=='5')
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                @endif
                                            </span>
                                        <!-- Rating End -->

                                        <!-- Review Title & Date Start -->
                                        <div class="review-title-date d-flex">
                                            <h5 class="title">{{$val->user->full_name}} </h5><span>{{ date('F d, Y h:i A', strtotime($val->created_at)) }}</span>
                                        </div>
                                        <!-- Review Title & Date End -->

                                    </div>
                                    <p>{{$val->comment}}</p>
                                </div>
                                <!-- Review Details End -->

                            </div>
                            <!-- End Single Review -->
                            @endforeach
                            @endguest
                    </div>
                </div>
                    <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- Shipping Policy Start -->
                        <div class="mt-8 shipping-policy mb-n3">
                            <h4 class="mb-4 title">Shipping policy for our store</h4>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate</p>
                            <ul class="mb-3 policy-list">
                                <li>1-2 business days (Typically by end of day)</li>
                                <li><a href="#">30 days money back guaranty</a></li>
                                <li>24/7 live support</li>
                                <li>odio dignissim qui blandit praesent</li>
                                <li>luptatum zzril delenit augue duis dolore</li>
                                <li>te feugait nulla facilisi.</li>
                            </ul>
                            <p class="mb-3">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
                            <p class="mb-3">claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per</p>
                            <p class="mb-3">seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                        </div>
                        <!-- Shipping Policy End -->
                    </div>
                    <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                        <div class="mt-8 size-tab table-responsive-lg">
                            <h4 class="mb-4 title-3">Size Chart</h4>
                            <table class="table mb-0 border">
                                <tbody>
                                    <tr>
                                        <td class="cun-name"><span>UK</span></td>
                                        <td>18</td>
                                        <td>20</td>
                                        <td>22</td>
                                        <td>24</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>European</span></td>
                                        <td>46</td>
                                        <td>48</td>
                                        <td>50</td>
                                        <td>52</td>
                                        <td>54</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>usa</span></td>
                                        <td>14</td>
                                        <td>16</td>
                                        <td>18</td>
                                        <td>20</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Australia</span></td>
                                        <td>28</td>
                                        <td>10</td>
                                        <td>12</td>
                                        <td>14</td>
                                        <td>16</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Canada</span></td>
                                        <td>24</td>
                                        <td>18</td>
                                        <td>14</td>
                                        <td>42</td>
                                        <td>36</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Single Product Tab End -->

        </div>
    </div>
</div>
<!-- Single Product Tab End -->

<!-- Product Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center section-title">
                    <h2 class="title">Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col">

                <div class="product-carousel arrow-outside-container">
                    <div class="swiper-container">

                        <div class="swiper-wrapper">






                         
                            @foreach ($related_animal as $val)
                            <div class="swiper-slide">
                                <!-- Product Start -->
                                <div class="product-wrapper">
                                    <div class="product">
                                        <!-- Thumb Start  -->
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="fit-image" style="height: 270px; width: 270px;" src="{{asset($val->image)}}" alt="Product" />
                                            </a>
                                            <div class="action-wrapper">
                                                <a href="#/" id="{{ $val->id }}" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                                {{--  <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="ti-heart"></i></a>  --}}
                                                <a href="cart.html" class="add-to-cart-btn action cart" data-animal-id="{{ $val->id }} title="Cart"><i class="ti-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <!-- Thumb End  -->

                                        <!-- Content Start  -->
                                        <div class="content">
                                            <h5 class="title"><a href="{{ route('animal_details', $animal->name) }}">{{$animal->name}}</a></h5>
                                            {{--  <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>  --}}
                                            <span class="price">
                                                @if ($animal->discount_price == null)
                                                    <span class="new">${{ $animal->selling_price }}</span>

                                                    @else
                                                    <span class="new">${{ $animal->discount_price }}</span>
                                                    <span class="old">${{$animal->selling_price}}</span>

                                                    @endif
                                            </span>
                                        </div>
                                        <!-- Content End  -->
                                    </div>
                                </div>
                                <!-- Product End -->
                            </div>
                            @endforeach

                         

                        </div>

                        <div class="swiper-pagination d-block d-md-none"></div>
                        <div class="swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="ti-angle-left"></i></div>
                        <div class="swiper-button-next swiper-nav-button d-none d-md-flex"><i class="ti-angle-right"></i></div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Product Section End -->



@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5"></script>
<script>
    $(document).ready(function() {
        $('#data-form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('review.store') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Show SweetAlert Toast success notification
                    Swal.fire({
                        icon: 'success',
                        title: response.title,
                        text: response.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });

                    // Reset the form
                    $('#data-form')[0].reset();
                },
                error: function(xhr) {
                    // Show SweetAlert Toast error notification
                    Swal.fire({
                        icon: 'error',
                        title: xhr.responseJSON.error ? xhr.responseJSON.title : 'Error',
                        text: xhr.responseJSON.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            });
        });
    });
</script>


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

@endsection
