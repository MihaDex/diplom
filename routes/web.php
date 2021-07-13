<?php

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

Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'MainController@index')->name('Главная');

    Route::get('/categories/{id}', 'MainController@categories')->where('id', '[0-9]+')->name("Категории");

    Route::get('/cart', 'MainController@cart')->name("Корзина");

    Route::get('/product/{id}', 'MainController@product')->where('id', '[0-9]+')->name("Товар");

    Route::match(['get','post'], '/getorderhome/{id}', 'MainController@getorderhome')->where('id', '[0-9]+')->name("Заказ дома");

    Route::get('/getproducts', 'MainController@getProducts');

    Route::get('/getcategories', 'MainController@getCategories');

    Route::get('/addtocart/{id}', 'MainController@addtocart')->where('id', '[0-9]+');

    Route::get('/cartplus/{rowId}', 'MainController@cartplus');

    Route::get('/cartminus/{rowId}', 'MainController@cartminus');

    Route::delete('/cartremove/{rowId}', 'MainController@cartremove');

    Route::match(['get','post'],'/getorder', 'MainController@getorder');

    Route::get('/resetCart', 'MainController@resetCart');

    Route::get('/getSum', 'MainController@getSum');

    Route::get('/admin', 'AdminController@main');

    Route::get('/admin/products', 'AdminController@products');

    Route::get('/admin/categories', 'AdminController@categories');

    Route::delete('/admin/deleteProduct/{id}', 'AdminController@deleteProduct')->where('id', '[0-9]+');

    Route::put('/admin/updateProduct/{id}', 'AdminController@updateProduct')->where('id', '[0-9]+');

    Route::match(['get','post'],'/admin/changeimage/{id}', 'AdminController@changeImage')->where('id', '[0-9]+');

    Route::match(['get','post'],'/admin/add-product', 'AdminController@addProduct');

    Route::match(['get','post'],'/admin/add-home', 'AdminController@addHome');

    Route::get('/admin/orders', 'AdminController@orders');

    Route::get('/admin/homes', 'AdminController@homes');

    Route::get('/admin/gethomes', 'AdminController@gethomes');

    Route::delete('/admin/deleteHome/{id}', 'AdminController@deleteHome')->where('id', '[0-9]+');

    Route::put('/admin/updateHome/{id}', 'AdminController@updateHome')->where('id', '[0-9]+');

    Route::match(['get','post'],'/admin/changeimagehome/{id}', 'AdminController@changeImageHome')->where('id', '[0-9]+');

    Route::get('/admin/order/{id}', 'AdminController@order')->where('id', '[0-9]+');

    Route::get('/admin/homeorders', 'AdminController@homeorders');

    Route::get('/admin/homeorder/{id}', 'AdminController@homeorder')->where('id', '[0-9]+');

    Route::get('/homeoffers','MainController@homeoffers')->name('Дома');

    Route::get('/about', 'MainController@about')->name('О нас');

    Route::get('/successorder', 'MainController@successorder')->name('Заказ создан');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });

});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('/migrate', function () {
//    $exitCode = Artisan::call('migrate');
//});
/*
Route::get('/paginate', function () {
    $exitCode = Artisan::call('vendor:publish' ,['--tag'=>'laravel-pagination']);
});
*/