<?php

use App\Http\Controllers\Front\CheckoutController;
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

Route::namespace('Front')->group(function () {
    Route::post('login', 'Auth\LoginController@login')->name('customers.login');
    Route::post('logout', 'Auth\LoginController@logout')->name('customers.logout');
    Route::post('register', 'CustomerController@register')->name('customers.register');
    Route::get('verify', 'CustomerController@showVerify')->name('customers.showVerify');
    Route::post('verify', 'CustomerController@verify')->name('customers.verify');
});

Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::get('/', function () {
        return redirect('admin/dashboard');
    });

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('/customers', 'CustomerController');
    Route::get('/customers/changeStatus/{id}/{status}', 'CustomerController@changeCustomerStatus')->name('customers.changeStatus');

    Route::prefix('customers')->group(function () {
        Route::get('getDeliveryAddresses/{id}', 'CustomerController@getDeliveryAddresses')->name('customers.getDeliveryAddresses');
    });

    Route::resource('/products', 'ProductController');
    Route::get('/products/changeStatus/{id}/{status}', 'ProductController@changeProductStatus')->name('products.changeStatus');

    Route::resource('/categories', 'CategoriesController');
    Route::resource('/stores', 'StoresController');
    Route::get('/stores/changeStatus/{id}/{status}', 'StoresController@changeStoreStatus')->name('stores.changeStatus');

    Route::resource('/sliders', 'SliderController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/reviews', 'ReviewController');
    Route::resource('/deliveryaddress', 'DeliveryAddressController');
    Route::resource('/offers', 'OfferController');
    Route::resource('/faqs', 'FaqController');
    Route::get('/faq/changeStatus/{id}/{status}', 'FaqController@changeFaqStatus')->name('faq.changeStatus');
    Route::resource('/companyprofile', 'CompanyProfileController');

    Route::resource('/socialMedias', 'SocialMediaController');
    Route::get('/socialMedias/changeStatus/{id}/{status}', 'SocialMediaController@changeMediaStatus')->name('socialMedias.changeStatus');


    Route::resource('/payments', 'PaymentController');
    Route::get('/payments/changeStatus/{id}/{status}', 'PaymentController@changePaymentStatus')->name('payments.changeStatus');
    Route::get('/profile', 'ProfileController@index')->name('userProfile');
});


Route::group(['middleware' => 'verified'], function () {
    Route::get('/', 'Front\HomeController@index')->name('index');
    Route::get('/menu', 'Front\MenuController@getMenu')->name('menu');
    Route::get('/about', 'Front\HomeController@aboutUs')->name('about');
    Route::get('/contact', 'Front\HomeController@contactUs')->name('contact');
    Route::get('/faq', 'Front\HomeController@faqs')->name('faq');
    Route::get('/cart', 'Front\HomeController@myCart');
    Route::get('/profile', 'Front\ProfileController@getProfile')->name('profile');
    Route::get('/address', 'Front\ProfileController@getAddress')->name('address');
    Route::get('editProfile', 'Front\ProfileController@editProfile')->name('editprofile');
    Route::post('updateProfile', 'Front\ProfileController@updateProfile')->name('customer-profile.update');
    Route::get('/wishlist', 'Front\ProfileController@getWishlist')->name('wishlist');
    Route::get('/orderlist', 'Front\ProfileController@getOrderlist')->name('orderlist');

    Route::get('/deliveryAddresses', 'Front\DeliveryAddressController@getDeliveryAddress')->name('deliveryAddress');
    Route::get('/medias', 'Front\HomeController@getSocialMedia');
    Route::get('/payments', 'Front\HomeController@getPayments');

    Route::get('/categories', 'Front\HomeController@getCategory')->name('categories');
    Route::get('singlecategory/{id}', 'Front\singleCategoryController@viewCategory')->name('singlecategory');
    Route::get('/products', 'Front\HomeController@getProductData')->name('products');
    Route::get('singleproduct/{id}', 'Front\singleProductController@viewProduct')->name('singleproduct');
    Route::get('checkout', 'Front\CheckoutController@checkout')->name('checkout')->middleware('customer');
    Route::post('checkout', 'Front\OrderController@checkout')->name('checkout.store');
});

Route::resource('/contactus', 'front\ContactUsController');
Route::get('foods/{category_slug}', 'Front\FoodController@categoryWiseFood')->name('categoryWiseFood');
Route::get('searchFoods', 'Front\SearchController@searchFoods')->name('searchFoods');
Route::get('forgotPassword', 'Front\ForgotPasswordController@index')->name('forgotPassword');
Route::get('getOrderItems/{orderId}', 'Front\ProfileController@getOrderItems');

Route::get('profile/editAddress/{id}', 'Front\ProfileController@editAddress');
Route::post('updateAddress/{id}', 'Front\ProfileController@updateAddress')->name('customer-address.update');
Route::get('deleteAddress/{id}', 'Front\ProfileController@delete')->name('address.destroy');