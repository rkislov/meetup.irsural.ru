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

Route::get( '/',['uses'=>'IndexController@execute', 'as'=>'main']);
Route::post( '/',['uses'=>'IndexController@execute', 'as'=>'main']);
Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);


Route::auth();

Route::group(['prefix'=>'admin','middleware'=>'auth'], function() {
    Route::get('/', function () {
        if(view()->exists('admin.index')){
            $data = ['title'=>'Панель администратора'];
            return view('admin.index',$data);
        }
       // return view('');
    })->name('admin');

    Route::group(['prefix'=>'pages'], function () {
        Route::get('/',['uses'=>'PagesController@execute','as'=>'pages']);

        Route::get('/add', ['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);
        Route::post( '/add', ['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);
        Route::get('/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
        Route::post('/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
        Route::delete('/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
    });


    Route::group(['prefix'=>'portfolios'], function () {
        Route::get('/',['uses'=>'PortfoliosController@execute','as'=>'portfolios']);

        Route::match(['get','post'], '/add', ['uses'=>'PortfoliosAddController@execute','as'=>'portfoliosAdd']);
        Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfoliosEditController@execute','as'=>'portfoliosEdit']);

    });

    Route::group(['prefix'=>'services'], function () {
        Route::get('/',['uses'=>'ServicesController@execute','as'=>'services']);

        Route::match(['get','post'], '/add', ['uses'=>'ServicesAddController@execute','as'=>'servicesAdd']);
        Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'ServicesEditController@execute','as'=>'servicesEdit']);
    });
    Route::group(['prefix'=>'peoples'], function () {
        Route::get('/','PeoplesController@execute')->name('peoples');

        Route::match(['get','post'], '/add','PeoplesAddController@execute')->name('peoplesAdd');
        Route::match(['get','post','delete'],'/edit/{people}','PeoplesEditController@execute')->name('peoplesEdit');
    });
    Route::group(['prefix'=>'partners'], function () {
        Route::get('/','PartnersController@execute')->name('partners');

        Route::match(['get','post'], '/add','PartnersAddController@execute')->name('partnersAdd');
        Route::match(['get','post','delete'],'/edit/{partner}','PartnersEditController@execute')->name('partnersEdit');
    });
    Route::group(['prefix'=>'registered'], function () {
        Route::get('/','RegisteredController@execute')->name('registered');

//        Route::match(['get','post'], '/add','PartnersAddController@execute')->name('partnersAdd');
//        Route::match(['get','post','delete'],'/edit/{partner}','PartnersEditController@execute')->name('partnersEdit');
    });
    Route::group(['prefix'=>'users'], function () {
        Route::get('/','UsersController@index')->name('users');
        Route::match(['get','post','delete'],'/edit/{user}','UsersController@edit')->name('usersEdit');
        Route::match(['get','post'], '/add','UsersController@add')->name('usersAdd');
        Route::match(['get','post'], '/changePassword/{user}','UsersController@changePassword')->name('changePassword');

    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
