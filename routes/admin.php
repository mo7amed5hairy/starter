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

Route::get('/admin', function () {
    return 'hello admin';
});



Route::namespace('Front')->group(function () {

    route::get('/lets','TestController@make_test');

});


Route::group(['prefix' => 'Front'],function (){

    route::get('/',function() {
        return "using prefix";
    });

});

Route::get('/dd',function (){
    return "good evening";
})->middleware('auth');

// the professional way for using group and middle ware is that //

Route::group(['prefix'=>'Front','middleware'=>'auth'],function (){

    route::get('/',function() {
        return "using prefix and middleware";
    });

});

// operations on controller in different namespace(folder) //

Route::get('/get_doc_data','Front\DoctorController@go_doc');

// using namespace inside group //

Route::group(['namespace'=>'Front'],function (){

    Route::get('/get_data','DoctorController@go_doc');
});

// using middleware forms //

Route::get('/middleware_method','Front\DoctorController@go_doc1')->middleware('auth');
Route::get('/middleware_method_2','Front\DoctorController@go_doc2');
Route::get('/middleware_method_3','Front\DoctorController@go_doc3');
Route::get('/middleware_method_4','Front\DoctorController@go_doc4')->middleware('auth');

Route::group(['middleware'=>'auth'],function (){
    Route::get('/middleware_on_method_1','Front\DoctorController@go_doc1');
    Route::get('/middleware_on_method_2','Front\DoctorController@go_doc2');
    Route::get('/middleware_on_method_3','Front\DoctorController@go_doc3');
    Route::get('/middleware_on_method_4','Front\DoctorController@go_doc4');

});

Route::group(['middleware'=>'auth','namespace'=>'Front'],function (){

    Route::get('/middleware_with_namespace_on_method_1','DoctorController@go_doc1');
    Route::get('/middleware_with_namespace_on_method_2','DoctorController@go_doc2');
    Route::get('/middleware_with_namespace_on_method_3','DoctorController@go_doc3');
    Route::get('/middleware_with_namespace_on_method_4','DoctorController@go_doc4');

});

// the last form is using middleware in controller construct with using exception to specific function
