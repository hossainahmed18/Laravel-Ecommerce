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
//...............................card manage ment.....................
// Card  mane hoilo car table er ak akekta row for every product for every user

Route::get('/','pagesController@product')->name('index');

Route::get('/index','pagesController@product')->name('index');
Route::get('/show','pagesController@product')->name('showproduct');



Route::get('/token/{token}','VerificationController@verify')->name('user.verification');


Route::group(['prefix' => 'product'], function(){
     Route::get('/', 'ProductController@index')->name('products');
     Route::get('/{slug}', 'ProductController@show')->name('product.show');

     //category route
     Route::get('/categories', 'CategoryController@index')->name('categories.index');
     Route::get('/category/{id}', 'CategoryController@show')->name('categories.show');




});

 Route::get('/search', 'pagesController@search')->name('search');










Route::group(['prefix' => 'user'], function(){
     Route::get('/token/{token}','VerificationController@verify')->name('user.verification');
     Route::get('/dashboard','UsersController@dashboard')->name('user.dashboard');
     Route::get('/profile','UsersController@profile')->name('user.profile');
     Route::post('/profile/update','UsersController@profileUpdate')->name('user.profile.update');

});



Route::group(['prefix' => 'amin'], function(){
     Route::get('/','AdminpagesController@adin')->name('admin.index');
     
     //multi Authetication
     Route::get('/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');     
     Route::post('/login/submit','Auth\Admin\LoginController@login')->name('admin.login.submit');
     Route::post('/logout','Auth\Admin\LoginController@logout')->name('admin.logout');

     //Forget passwprd

     Route::get('/password/reset','Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    
     Route::post('/password/resetPost','Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');


     //password reset From Email
     Route::get('/password/reset/{token}','Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    
     Route::post('/password/reset','Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');



    Route::group(['prefix' => '/product'], function(){
          Route::get('/','AdminProductController@manage')->name('admin.products');
          Route::get('/create','AdminProductController@create')->name('admin.product.create');
          Route::post('/create','AdminProductController@store')->name('admin.product.store');

         Route::post('/edit{id}','AdminProductController@update')->name('admin.product.update');

         Route::get('/edit/{id}','AdminProductController@edit')->name('admin.product.edit');
         Route::post('/delete/{id}','AdminProductController@delete')->name('admin.product.delete');

    });


    Route::group(['prefix' => '/category'], function(){
          Route::get('/','AdminCategoryController@manage')->name('admin.categories');
          Route::get('/create','AdminCategoryController@create')->name('admin.category.create');
          Route::post('/create','AdminCategoryController@store')->name('admin.category.store');

         Route::post('/edit{id}','AdminCategoryController@update')->name('admin.category.update');

         Route::get('/edit/{id}','AdminCategoryController@edit')->name('admin.category.edit');
         Route::post('/delete/{id}','AdminCategoryController@delete')->name('admin.category.delete');

    });


    Route::group(['prefix' => '/brand'], function(){
          Route::get('/','AdminBrandController@manage')->name('admin.brands');
          Route::get('/create','AdminBrandController@create')->name('admin.brand.create');
          Route::post('/create','AdminBrandController@store')->name('admin.brand.store');

         Route::post('/edit{id}','AdminBrandController@update')->name('admin.brand.update');

         Route::get('/edit/{id}','AdminBrandController@edit')->name('admin.brand.edit');
         Route::post('/delete/{id}','AdminBrandController@delete')->name('admin.brand.delete');

    });


    // Division Routes
    Route::group(['prefix' => '/division'], function(){
      Route::get('/', 'DivisionController@index')->name('admin.divisions');
      Route::get('/create','DivisionController@create')->name('admin.division.create');
      Route::get('/edit/{id}','DivisionController@edit')->name('admin.division.edit');

      Route::post('/store','DivisionController@store')->name('admin.division.store');

      Route::post('/edit/{id}','DivisionController@update')->name('admin.division.update');
      Route::post('/delete/{id}','DivisionController@delete')->name('admin.division.delete');
    });

  // District Routes
    Route::group(['prefix' => '/district'], function(){
      Route::get('/','DistrictController@index')->name('admin.districts');
      Route::get('/create','DistrictController@create')->name('admin.district.create');
      Route::get('/edit/{id}','DistrictController@edit')->name('admin.district.edit');

      Route::post('/store','DistrictController@store')->name('admin.district.store');

      Route::post('/district/edit/{id}','DistrictController@update')->name('admin.district.update');
      Route::post('/district/delete/{id}','DistrictController@delete')->name('admin.district.delete');
    });


    //Orders controller 

     Route::group(['prefix' => '/order'], function(){
     Route::get('/','AdminOrdersController@index')->name('admin.orders');
     Route::get('/show/{id}','AdminOrdersController@show')->name('admin.order.show');
     Route::post('/delete/{id}','AdminOrdersController@delete')->name('admin.order.delete');

     Route::post('/completed/{id}', 'AdminOrdersController@completed')->name('admin.order.completed');

     Route::post('/paid/{id}', 'AdminOrdersController@paid')->name('admin.order.paid');
   });



   /*


     Route::group(['prefix' => '/orders'], function(){
    Route::get('/', 'Backend\AdminOrdersController@index')->name('admin.orders');
    Route::get('/view/{id}', 'Backend\AdminOrdersController@show')->name('admin.order.show');
    Route::post('/delete/{id}', 'Backend\AdminOrdersController@delete')->name('admin.order.delete');

    Route::post('/completed/{id}', 'Backend\AdminOrdersController@completed')->name('admin.order.completed');

    Route::post('/paid/{id}', 'Backend\AdminOrdersController@paid')->name('admin.order.paid');


   */

    //Ajax Route




 

     
});



Route::group(['prefix' => 'cart'], function(){
      Route::get('/','CartsController@index')->name('carts');
      Route::post('/store','CartsController@store')->name('carts.store');
      Route::post('/update/{id}','CartsController@update')->name('carts.update');
      Route::post('/delete/{id}','CartsController@delete')->name('carts.delete');

      
});



Route::group(['prefix' => 'checkout'], function(){
      Route::get('/','CheckoutsController@index')->name('checkouts');
      Route::post('/delete/{id}','CheckoutsController@delete')->name('checkouts.delete');
      Route::post('/store','CheckoutsController@store')->name('checkouts.store');

      
});



Route::get('get-districts/{id}',function($id){
         return json_encode(App\District::where('division_id',$id)->get()); 
          
});

  

   
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
