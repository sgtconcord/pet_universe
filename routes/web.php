<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LoginSliderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PickupPointController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SiteReviewController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('site.index');
// })->name('home');



Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/all_product', [SiteController::class, 'all_product'])->name('all_product');
Route::get('/about_us', [SiteController::class, 'about_us'])->name('about_us');
// Route::get('/about_us', function () {return view('site.about_us');})->name('about_us');

// All Details Sites
Route::get('/animal_details/{name}', [SiteController::class, 'animal_details'])->name('animal_details');
Route::get('/quickview/{id}', [SiteController::class, 'quickview']);
Route::get('/product-quick-view/{id}', [CartController::class, 'stores'])->name('add.to.cart');
Route::get('/subcategory_details/{id}', [SiteController::class, 'subcategory_details'])->name('subcategory_details');


// Route::get('/shopping/cartlist', function () {
//     return view('site.cart_page');
// })->name('/shopping/cartlist');



// Route::get('/shop', function () {
//     return view('site.shop');
// })->name('shop');


// Route::get('api/fetch-doctors/{id}', [ApiController::class, 'doctors']);
Route::get('api/fetch-subcategory/{id}', [ApiController::class, 'subcategory']);


Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');



Route::get('/logout', [SiteController::class, 'logout'])->middleware('auth')->name('logout');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [SiteController::class, 'profile'])->name('profile');

    # Ajax
    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::post('/permission-by-role', [PermissionController::class, 'getPermissionByRole'])->middleware('role_or_permission:Super Admin|Manage Permission')->name('get.permission.by.role');
        Route::post('/update/user/status', [UserController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.user.status');
        Route::post('/update/category/status', [CategoriesController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.category.status');
        Route::post('/update/subcategory/status', [SubCategoryController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.subcategory.status');
        Route::post('/update/pickuppoint/status', [PickupPointController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.pickuppoint.status');
        Route::post('/update/product/status', [ProductController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.product.status');
        Route::post('/update/slider/status', [ProductController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.slider.status');
        Route::post('/update/animal/status', [AnimalController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.animal.status');
        Route::post('/update/food/status', [FoodController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.food.status');
        Route::post('/update/animal/featured', [AnimalController::class, 'ajaxUpdateFeatured'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.animal.featured');
        Route::post('/update/animal/today_deal', [AnimalController::class, 'ajaxUpdatedeal'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.animal.today_deal');
        Route::post('/update/order/status', [OrderController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.order.status');
        Route::post('/update/backgrouond/status', [BackgroundImageController::class, 'ajaxUpdateStatus'])->name('update.backgroundImage.status');
    });


    #Users
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/create', [UserController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [UserController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [UserController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [UserController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [UserController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [UserController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #Roles
    Route::prefix('role')->name('role.')->group(function () {
        Route::get('/create', [RoleController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Role')->name('create');
        Route::post('/store', [RoleController::class, 'store'])->middleware('role_or_permission:Super Admin|Create Role|Manage Role')->name('store');
        Route::get('/manage/{id}', [RoleController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Role')->name('manage');
        Route::get('/{id}/view', [RoleController::class, 'view'])->middleware('role_or_permission:Super Admin|View Role')->name('view');
        Route::delete('/destroy', [RoleController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Role')->name('destroy');
        Route::get('/list', [RoleController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of Role')->name('list');
    });

    #Permission
    Route::match(['get', 'post'], '/permission/manage', [PermissionController::class, 'managePermission'])->middleware('role_or_permission:Super Admin|Manage Permission')->name('permission.manage');



    #Categories
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/create', [CategoriesController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [CategoriesController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [CategoriesController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [CategoriesController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [CategoriesController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [CategoriesController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #SubCategory
    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('/create', [SubCategoryController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [SubCategoryController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [SubCategoryController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [SubCategoryController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [SubCategoryController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [SubCategoryController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #Pickup Point
    Route::prefix('pickuppoint')->name('pickuppoint.')->group(function () {
        Route::get('/create', [PickupPointController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [PickupPointController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [PickupPointController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [PickupPointController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [PickupPointController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [PickupPointController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #Animal
    Route::prefix('animal')->name('animal.')->group(function () {
        Route::get('/create', [AnimalController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Animal')->name('create');
        Route::post('/store', [AnimalController::class, 'store'])->middleware('role_or_permission:Super Admin|Store Animal')->name('store');
        Route::get('/manage/{id}', [AnimalController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Animal')->name('manage');
        Route::get('/{id}/view', [AnimalController::class, 'view'])->middleware('role_or_permission:Super Admin|View Animal')->name('view');
        Route::delete('/destroy', [AnimalController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Animal')->name('destroy');
        Route::get('/list', [AnimalController::class, 'index'])->middleware('role_or_permission:Super Admin|List of Animal')->name('list');
    });

    #Review
    Route::prefix('review')->name('review.')->group(function () {
        Route::get('/create', [ReviewController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Slider')->name('create');
        Route::post('/store', [ReviewController::class, 'store'])->middleware('role_or_permission:Super Admin|Customer|Store Slider')->name('store');
        Route::get('/manage/{id}', [ReviewController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Slider')->name('manage');
        Route::get('/view', [ReviewController::class, 'view'])->middleware('role_or_permission:Super Admin|View Slider')->name('view');
        Route::delete('/destroy', [ReviewController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Slider')->name('destroy');
        Route::get('/list', [ReviewController::class, 'index'])->middleware('role_or_permission:Super Admin|List of Slider')->name('list');
    });

    Route::prefix('food')->name('food.')->group(function () {
        Route::match(['get', 'post'], '/crete-store', [FoodController::class, 'createOrStore'])->name('create_store');
        Route::get('/list', [FoodController::class, 'index'])->middleware('role_or_permission:Super Admin|List of Slider')->name('list');
        Route::get('/manage/{id}', [FoodController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Slider')->name('manage');
        Route::delete('/destroy', [FoodController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Slider')->name('destroy');
    });
    #Slider
    Route::prefix('slider')->name('slider.')->group(function () {
        Route::get('/create', [SliderController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Slider')->name('create');
        Route::post('/store', [SliderController::class, 'store'])->middleware('role_or_permission:Super Admin|Customer|Store Slider')->name('store');
        Route::get('/manage/{id}', [SliderController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Slider')->name('manage');
        Route::get('/view', [SliderController::class, 'view'])->middleware('role_or_permission:Super Admin|View Slider')->name('view');
        Route::delete('/destroy', [SliderController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Slider')->name('destroy');
        Route::get('/list', [SliderController::class, 'index'])->middleware('role_or_permission:Super Admin|List of Slider')->name('list');
    });

    #Review
    Route::prefix('sitereview')->name('sitereview.')->group(function () {
        Route::get('/create', [SiteReviewController::class, 'create'])->middleware('role_or_permission:Super Admin|Customer|Create SiteReview')->name('create');
        Route::post('/store', [SiteReviewController::class, 'store'])->middleware('role_or_permission:Super Admin|Customer|Store SiteReview')->name('store');
        Route::get('/manage/{id}', [SiteReviewController::class, 'manage'])->middleware('role_or_permission:Super Admin|Customer|Manage SiteReview')->name('manage');
        Route::get('/view', [SiteReviewController::class, 'view'])->middleware('role_or_permission:Super Admin|View SiteReview')->name('view');
        Route::delete('/destroy', [SiteReviewController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Customer|Delete SiteReview')->name('destroy');
        Route::get('/list', [SiteReviewController::class, 'index'])->middleware('role_or_permission:Super Admin|Customer|List of SiteReview')->name('list');
    });


        #setting
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/create', [SettingController::class, 'create'])->name('create');
            Route::get('/manage/{id}', [SettingController::class, 'manage'])->name('manage');
            Route::post('/store', [SettingController::class, 'store'])->name('store');
            Route::get('/list', [SettingController::class, 'index'])->name('list');
            Route::delete('/destroy', [SettingController::class, 'destroy'])->name('destroy');
          });


    // #Cart
    // Route::prefix('shopping')->name('shopping.')->group(function () {
    //     Route::get('/cartlist', [CartController::class, 'cartList'])->name('cartlist');
    //     Route::post('/cartlist', [CartController::class, 'store'])->name('carts.store');
    //     Route::post('/update-cart', [CartController::class, 'updateCart'])->name('carts.update');
    //     // Route::delete('/remove', [CartController::class, 'removeFromCart'])->name('remove');
    //     Route::delete('/remove/{id}', [CartController::class, 'removeCart'])->name('remove');
    // });

    // Route::get('/cartlist', [SiteController::class, 'cartList'])->name('cartlist');

    // order list
    Route::get('/order-list', [OrderController::class, 'index'])->name('order.list');


    // site
    Route::controller(StripePaymentController::class)->group(function () {
        Route::get('payment-checkout', 'paymentCheckout')->name('paymentCheckout');
        Route::post('payment-checkout', 'paymentCheckoutStore')->name('paymentCheckoutStore');
    });

    #Background login Image
    Route::match(['get', 'post'], '/background-image', [LoginSliderController::class, 'createOrIndex'])->name('admin.backgroundImage');
    Route::delete('/background-image/destroy', [LoginSliderController::class, 'destroy'])->name('admin.backgroundImage.destroy');
});



#Cart
Route::prefix('shopping')->name('shopping.')->group(function () {
    Route::get('/cartlist', [CartController::class, 'cartList'])->name('cartlist');
    Route::post('/cartlist', [CartController::class, 'store'])->name('carts.store');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('carts.update');
    // Route::delete('/remove', [CartController::class, 'removeFromCart'])->name('remove');
    Route::delete('/remove/{id}', [CartController::class, 'removeCart'])->name('remove');
});

Route::get('/cartlist', [SiteController::class, 'cartList'])->name('cartlist');
