<?php

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

// include('api.php');
Route::get('/index','HomeController@index')->name('index');



Route::get('/timkiem','HomeController@timkiem')->name('timkiem');

Route::get('/dangnhap','HomeController@dangnhap')->name('dangnhap');
Route::get('/pdangnhap','HomeController@postdangnhap')->name('pdangnhap');

Route::get('/dangki','HomeController@dangki')->name('dangki');
Route::post('/dangki','HomeController@postdangki')->name('dangki');

Route::get('/dangxuat','HomeController@dangxuat')->name('dangxuat');

Route::get('/doimatkhau','HomeController@doimatkhau')->name('doimatkhau');
Route::post('/doimatkhau','HomeController@postdoimatkhau')->name('doimatkhau');

Route::get('/chitiet/{id?}','HomeController@chitiet')->name('chitiet');
Route::post('/chitiet/{id?}','HomeController@postBinhluan')->name('chitiet');


Route::get('/admin','AdminController@home')->name('admin');



Route::resource('sanpham','ControllerSanpham');
Route::resource('order','ControllerOrder');
Route::resource('taikhoan','ControllerTaikhoan');
Route::resource('khuyenmai','ControllerKhuyenmai');
Route::resource('binhluan','ControllerBinhluan');

Route::get('cart/{id?}', ['as' => 'cart', 'uses' => 'HomeController@cart']);

Route::get('ship','HomeController@ship')->name('ship');

Route::get('add-to-cart2/{id}',[
	'as'=>'themgiohang2',
	'uses'=>'HomeController@getAddtoCart2'
]);

Route::get('delete-to-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'HomeController@getDeletetoCart'
]);
Route::get('delete-all-to-cart/{id}',[
	'as'=>'xoahetgiohang',
	'uses'=>'HomeController@getDeletealltoCart'
]);