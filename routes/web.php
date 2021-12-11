<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('locale', 'LocalizationController@getLang')->name('getlang');
// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang')->name('setlang');

Auth::routes(['register'=>false]);

Route::get('user/login','FrontendController@login')->name('login.form');
Route::post('user/login','FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout','FrontendController@logout')->name('user.logout');

Route::get('user/register','FrontendController@register')->name('register.form');
Route::post('user/register','FrontendController@registerSubmit')->name('user.register.submit');
// Reset password
  Route::get('password-reset', 'FrontendController@showResetForm')->name('user.password.reset');
// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');

//main
Route::get('/','MainController@home')->name('main.home');
Route::get('/signUp','MainController@register')->name('register');
Route::post('/signUp/store','MainController@registerSubmit')->name('register.submit');





Route::group(['prefix'=>'/store'],function(){
// Frontend Routes
Route::get('/', 'FrontendController@home')->name('home');
Route::get('/main', 'FrontendController@home')->name('index.home');
Route::get('/about-us','FrontendController@aboutUs')->name('about-us');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact/message','MessageController@store')->name('contact.store');
Route::get('product-detail/{slug}','FrontendController@productDetail')->name('product-detail');
Route::post('/product/search','FrontendController@productSearch')->name('product.search');
Route::get('/product-cat/{slug}','FrontendController@productCat')->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}','FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-brand/{slug}','FrontendController@productBrand')->name('product-brand');
// Cart section
Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart')->middleware('user');
Route::post('/add-to-cart','CartController@singleAddToCart')->name('single-add-to-cart')->middleware('user');
Route::get('cart-delete/{id}','CartController@cartDelete')->name('cart-delete');
Route::post('cart-update','CartController@cartUpdate')->name('cart.update');

 Route::get('/cart','CartController@cart')->name('cart');
Route::get('/checkout','CartController@checkout')->name('checkout')->middleware('user');
// Wishlist
Route::get('/wishlist','FrontendController@wishlist')->name('wishlist');
Route::get('/wishlist/{slug}','WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}','WishlistController@wishlistDelete')->name('wishlist-delete');
Route::post('cart/order','OrderController@store')->name('cart.order');
Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
Route::get('/income','OrderController@incomeChart')->name('product.order.income');
// Route::get('/user/chart','AdminController@userPieChart')->name('user.piechart');
Route::get('/product-grids','FrontendController@productGrids')->name('product-grids');
Route::get('/product-lists','FrontendController@productLists')->name('product-lists');
Route::match(['get','post'],'/filter','FrontendController@productFilter')->name('shop.filter');
// Order Track
Route::get('/product/track','OrderController@orderTrack')->name('order.track');
Route::post('product/track/order','OrderController@productTrackOrder')->name('product.track.order');
// Blog
Route::get('/blog','FrontendController@blog')->name('blog');
Route::get('/blog-detail/{slug}','FrontendController@blogDetail')->name('blog.detail');
Route::get('/blog/search','FrontendController@blogSearch')->name('blog.search');
Route::post('/blog/filter','FrontendController@blogFilter')->name('blog.filter');
Route::get('blog-cat/{slug}','FrontendController@blogByCategory')->name('blog.category');
Route::get('blog-tag/{slug}','FrontendController@blogByTag')->name('blog.tag');

// NewsLetter
Route::post('/subscribe','FrontendController@subscribe')->name('subscribe');

// Product Review
Route::resource('/review','ProductReviewController');
Route::post('product/{slug}/review','ProductReviewController@store')->name('product.review.store');

// Post Comment
Route::post('post/{slug}/comment','PostCommentController@store')->name('post-comment.store');
Route::resource('/comment','PostCommentController');
// Coupon
Route::post('/coupon-store','CouponController@couponStore')->name('coupon-store');
// Payment
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');





});



// Backend section start

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Route::get('/','AdminController@index')->name('admin');
    Route::get('/file-manager','AdminController@fileManager')->name('file-manager');
    // user route
    Route::resource('users','UsersController');
    // admin route
    Route::resource('admins','AdminsController');
    // role route
    Route::resource('roles','RoleController');
    // Banner
    Route::resource('banner','BannerController');
    // Brand
    Route::resource('brand','BrandController');
    // Profile
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/category','CategoryController');
    // Product
    Route::resource('/product','ProductController');
    // Ajax for sub category
    Route::post('/category/{id}/child','CategoryController@getChildByParent');
    // POST category
    Route::resource('/post-category','PostCategoryController');
    // Post tag
    Route::resource('/post-tag','PostTagController');
    // Post
    Route::resource('/post','PostController');
    // Message
    Route::resource('/message','MessageController');
    Route::get('/message/five','MessageController@messageFive')->name('messages.five');

    // Order
    Route::resource('/order','OrderController');
    // Shipping
    Route::resource('/shipping','ShippingController');
    // Coupon
    Route::resource('/coupon','CouponController');
    // Settings
    Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    Route::get('/notifications','NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    // Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');

    //invitations
    Route::group(["prefix" => "invitations"], function () {
        Route::group(['middleware' => ['permission:read_invitations']], function () {
            Route::get('/', [App\Http\Controllers\InvitationController::class, 'index'])->name('invitations.read');

        });
        Route::group(['middleware' => ['permission:our_invitations']], function () {
            Route::get('/our_invitations', [App\Http\Controllers\InvitationController::class, 'our_invitation'])->name('invitations.read.our');
            Route::get('/{invitation}/show', [App\Http\Controllers\InvitationController::class, 'show'])->name('invitations.show');
        });
        Route::group(['middleware' => ['permission:create_invitations']], function () {
            Route::get('/create', [App\Http\Controllers\InvitationController::class, 'create'])->name('invitations.create');
            Route::post('/store', [App\Http\Controllers\InvitationController::class, 'store'])->name('invitations.store');
        });
        Route::group(['middleware' => ['permission:update_invitations']], function () {
            Route::get('/{invitation}/edit', [App\Http\Controllers\InvitationController::class, 'edit'])->name('invitations.edit');
            Route::patch('/{invitation}', [App\Http\Controllers\InvitationController::class, 'update'])->name('invitations.update');
        });
        Route::group(['middleware' => ['permission:delete_invitations']], function () {
            Route::delete('delete/{invitation}', [App\Http\Controllers\InvitationController::class, 'destroy'])->name('invitations.destroy');
        });
    });

    //Meetings
    Route::group(["prefix" => "meetings"], function () {
        Route::group(['middleware' => ['permission:read_meetings']], function () {
            Route::get('/', [App\Http\Controllers\MeetingController::class, 'index'])->name('meetings.read');
        });
        Route::group(['middleware' => ['permission:create_meetings']], function () {
            Route::get('/create', [App\Http\Controllers\MeetingController::class, 'create'])->name('meetings.create');
            Route::post('/store', [App\Http\Controllers\MeetingController::class, 'store'])->name('meetings.store');
        });
        Route::group(['middleware' => ['permission:update_meetings']], function () {
            Route::get('/{meeting}/edit', [App\Http\Controllers\MeetingController::class, 'edit'])->name('meetings.edit');
            Route::patch('/{meeting}', [App\Http\Controllers\MeetingController::class, 'update'])->name('meetings.update');
        });
        Route::group(['middleware' => ['permission:delete_meetings']], function () {
            Route::delete('delete/{meeting}', [App\Http\Controllers\MeetingController::class, 'destroy'])->name('meetings.destroy');
        });
    });

    //Cleaning Companies
    Route::group(["prefix" => "cleaning_companies"], function () {
        Route::group(['middleware' => ['permission:read_cleaning_companies']], function () {
            Route::get('/', [App\Http\Controllers\CleaningCompanyController::class, 'index'])->name('cleaning_companies.read');
        });
        Route::group(['middleware' => ['permission:create_cleaning_companies']], function () {
            Route::get('/create', [App\Http\Controllers\CleaningCompanyController::class, 'create'])->name('cleaning_companies.create');
            Route::post('/store', [App\Http\Controllers\CleaningCompanyController::class, 'store'])->name('cleaning_companies.store');
        });
        Route::group(['middleware' => ['permission:update_cleaning_companies']], function () {
            Route::get('/{meeting}/edit', [App\Http\Controllers\CleaningCompanyController::class, 'edit'])->name('cleaning_companies.edit');
            Route::patch('/{meeting}', [App\Http\Controllers\CleaningCompanyController::class, 'update'])->name('cleaning_companies.update');
        });
        Route::group(['middleware' => ['permission:delete_cleaning_companies']], function () {
            Route::delete('delete/{meeting}', [App\Http\Controllers\CleaningCompanyController::class, 'destroy'])->name('cleaning_companies.destroy');
        });
    });


     //Maintenance Companies
     Route::group(["prefix" => "maintenance_companies"], function () {
        Route::group(['middleware' => ['permission:read_maintenance_companies']], function () {
            Route::get('/', [App\Http\Controllers\MaintenanceCompanyController::class, 'index'])->name('maintenance_companies.read');
        });
        Route::group(['middleware' => ['permission:create_maintenance_companies']], function () {
            Route::get('/create', [App\Http\Controllers\MaintenanceCompanyController::class, 'create'])->name('maintenance_companies.create');
            Route::post('/store', [App\Http\Controllers\MaintenanceCompanyController::class, 'store'])->name('maintenance_companies.store');
        });
        Route::group(['middleware' => ['permission:update_maintenance_companies']], function () {
            Route::get('/{meeting}/edit', [App\Http\Controllers\MaintenanceCompanyController::class, 'edit'])->name('maintenance_companies.edit');
            Route::patch('/{meeting}', [App\Http\Controllers\MaintenanceCompanyController::class, 'update'])->name('maintenance_companies.update');
        });
        Route::group(['middleware' => ['permission:delete_maintenance_companies']], function () {
            Route::delete('delete/{meeting}', [App\Http\Controllers\MaintenanceCompanyController::class, 'destroy'])->name('maintenance_companies.destroy');
        });
    });


    //Emergency Number
    Route::group(["prefix" => "emergency_numbers"], function () {
        Route::group(['middleware' => ['permission:read_emergency_numbers']], function () {
            Route::get('/', [App\Http\Controllers\EmergencyNumberController::class, 'index'])->name('emergency_numbers.read');
        });
        Route::group(['middleware' => ['permission:create_emergency_numbers']], function () {
            Route::get('/create', [App\Http\Controllers\EmergencyNumberController::class, 'create'])->name('emergency_numbers.create');
            Route::post('/store', [App\Http\Controllers\EmergencyNumberController::class, 'store'])->name('emergency_numbers.store');
        });
        Route::group(['middleware' => ['permission:update_emergency_numbers']], function () {
            Route::get('/{emergency_number}/edit', [App\Http\Controllers\EmergencyNumberController::class, 'edit'])->name('emergency_numbers.edit');
            Route::patch('/{emergency_number}', [App\Http\Controllers\EmergencyNumberController::class, 'update'])->name('emergency_numbers.update');
        });
        Route::group(['middleware' => ['permission:delete_emergency_numbers']], function () {
            Route::delete('delete/{emergency_number}', [App\Http\Controllers\EmergencyNumberController::class, 'destroy'])->name('emergency_numbers.destroy');
        });
    });


    //Places
    Route::group(["prefix" => "places"], function () {
        Route::group(['middleware' => ['permission:read_places']], function () {
            Route::get('/', [App\Http\Controllers\PlaceController::class, 'index'])->name('places.read');
        });
        Route::group(['middleware' => ['permission:create_places']], function () {
            Route::get('/create', [App\Http\Controllers\PlaceController::class, 'create'])->name('places.create');
            Route::post('/store', [App\Http\Controllers\PlaceController::class, 'store'])->name('places.store');
        });
        Route::group(['middleware' => ['permission:update_places']], function () {
            Route::get('/{meeting}/edit', [App\Http\Controllers\PlaceController::class, 'edit'])->name('places.edit');
            Route::patch('/{meeting}', [App\Http\Controllers\PlaceController::class, 'update'])->name('places.update');
        });
        Route::group(['middleware' => ['permission:delete_places']], function () {
            Route::delete('delete/{meeting}', [App\Http\Controllers\PlaceController::class, 'destroy'])->name('places.destroy');
        });
    });
    //Maps
    Route::group(["prefix" => "maps"], function () {
        Route::group(['middleware' => ['permission:read_maps']], function () {
            Route::get('/', [App\Http\Controllers\AdminController::class, 'maps'])->name('maps.read');
        });

    });
    Route::get('auth-user', 'AuthUserController@show');

    Route::group(["prefix" => "social"], function () {
        Route::group(['middleware' => ['permission:read_places']], function () {
            Route::get('/', [App\Http\Controllers\Social\HomeController::class, 'index'])->name('social.read');
            Route::apiResources([
                '/posts' => Social\PostController::class,
                '/posts/{post}/like' =>Social\PostLikeController::class,
                '/posts/{post}/comment' => Social\PostCommentController::class,
                '/users' =>Social\UserController::class,
                '/users/{user}/posts' => Social\UserPostController::class,
                '/friend-request' => Social\FriendRequestController::class,
                '/friend-request-response' =>Social\FriendRequestResponseController::class,
                '/user-images' =>Social\UserImageController::class,

                ]);

        });

    });



});










// User section start
// Route::group(['prefix'=>'/user','middleware'=>['user']],function(){
//     Route::get('/','HomeController@index')->name('user');
//      // Profile
//      Route::get('/profile','HomeController@profile')->name('user-profile');
//      Route::post('/profile/{id}','HomeController@profileUpdate')->name('user-profile-update');
//     //  Order
//     Route::get('/order',"HomeController@orderIndex")->name('user.order.index');
//     Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');
//     Route::delete('/order/delete/{id}','HomeController@userOrderDelete')->name('user.order.delete');
//     // Product Review
//     Route::get('/user-review','HomeController@productReviewIndex')->name('user.productreview.index');
//     Route::delete('/user-review/delete/{id}','HomeController@productReviewDelete')->name('user.productreview.delete');
//     Route::get('/user-review/edit/{id}','HomeController@productReviewEdit')->name('user.productreview.edit');
//     Route::patch('/user-review/update/{id}','HomeController@productReviewUpdate')->name('user.productreview.update');

//     // Post comment
//     Route::get('user-post/comment','HomeController@userComment')->name('user.post-comment.index');
//     Route::delete('user-post/comment/delete/{id}','HomeController@userCommentDelete')->name('user.post-comment.delete');
//     Route::get('user-post/comment/edit/{id}','HomeController@userCommentEdit')->name('user.post-comment.edit');
//     Route::patch('user-post/comment/udpate/{id}','HomeController@userCommentUpdate')->name('user.post-comment.update');

//     // Password Change
//     Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
//     Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');

// });

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
