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

/*GENERAL*/
    Route::get('/', 'Controller@show_main_page')->name('show_main_page');
    Route::get('/our_mission' , 'Controller@show_donation_page')->name('show_donation_page');


/*SEARCH*/
    Route::get('/search_results_main_search' , 'Controller@show_search_results_main_search')->name('show_search_results_main_search');
    Route::get('/search_results_main_search_zupanije{variable}' , 'Controller@sub_zupanije_search_under_main_search')->name('sub_zupanije_search_under_main_search');

    Route::get('/search_choice' , 'Controller@show_search_choice')->name('show_search_choice');

    Route::get('/search_products' , 'Controller@show_products_search')->name('show_products_search');
    Route::get('/search_products_find' , 'Controller@find_products')->name('find_products');

    Route::get('/search_opgs' , 'Controller@show_opg_search')->name('show_opg_search');
    Route::get('/search_opgs_find' , 'Controller@find_opgs')->name('find_opgs');

    Route::get('/list_of_categories/{category}' , 'Controller@main_categories')->name('show_categories');
    Route::get('/list_of_categories_search/{category}' , 'Controller@main_categories_search')->name('main_categories_search');


/*OPG/PRODUCTS*/
    Route::get('/opg/{id}' , 'firm_controller@show_opg')->name('show_opg');
    Route::get('/product/{id}' , 'product_controller@show_product')->name('show_product');


 /*FOOTER*/

    Route::get('/about_us' , 'Controller@show_about_us')->name('show_about_us');
    Route::get('/faq' , 'Controller@show_faq')->name('show_faq');
    Route::get('/conditions' , 'Controller@show_conditions')->name('show_conditions');
    Route::get('/help' , 'Controller@show_help')->name('show_help');
    Route::post('/help/save' , 'Controller@save_help_question')->name('save_help_question')->middleware('auth');



Route::group([ 'middleware' => 'auth' , 'middleware' => 'verified'], function()
{
        /*REVIEWS*/
            Route::get('/review/{id}' , 'review_controller@show_review_form')->name('show_review_form');
            Route::post('/save/review/' , 'review_controller@save_review')->name('save_review');

    /*FAVOURITES*/
        /*FIRMS*/
            Route::get('/save_to_favourites/{firm_id}' , 'favourite_controller@save_firm_favourite')->name('save_user_firm_favourite');
            Route::get('/remove_from_favourites/{firm_id}' , 'favourite_controller@remove_firm_favourite')->name('remove_firm_favourite');

        /*PRODUCTS*/
            Route::get('/save_to_favourites_product/{product_id}' , 'favourite_controller@save_product_favourite')->name('save_product_favourite');
            Route::get('/remove_from_favourites_product/{product_id}' , 'favourite_controller@remove_product_favourite')->name('remove_product_favourite');
});




Route::group([ 'prefix' => 'user' ,'middleware' => 'auth' , 'middleware' => 'verified'], function()
{
    /*USER DASHBOARD*/
        /*USER PROFILE*/
        Route::get('/user_profile' , 'user_controller@show_user_profile')->name('show_user_profile');
        Route::post('/update_user_profile' , 'user_controller@update_user_info')->name('update_user_info');

        Route::get('/delete_form' , 'user_controller@show_delete_form')->name('delete_user_profile');
        Route::post('/delete_user' , 'user_controller@delete_user')->name('delete_user');

    /*USER PRODUKTI*/
        Route::get('/user_profile_products' , 'product_controller@show_user_products')->name('show_user_products');

        Route::get('/user_profile_products/sold{id}' , 'product_controller@product_is_sold')->name('product_is_sold');
        Route::get('/user_profile_products/active{id}' , 'product_controller@product_is_active')->name('product_is_active');

        Route::post('/user_profile_products/save_new_product' , 'product_controller@save_new_user_products')->name('save_new_user_products');
        Route::get('/user_profile_products/delete_product{id}' , 'product_controller@delete_user_products')->name('delete_user_products');

        Route::get('/user_profile_products/search_product_categorie_{categorie}' , 'product_controller@search_product_categorie')->name('search_product_categorie');


        Route::get('/user_profile_products/are_my_products_favourited' , 'product_controller@are_my_products_favourited')->name('are_my_products_favourited');



        Route::get('/user_profile_products_favourite' , 'user_controller@show_user_products_favourite')->name('show_user_products_favourite');





        Route::get('/user_profile_opg' , 'firm_controller@show_user_firm')->name('show_user_opg');
        Route::post('/user_profile_opg/store{id}' , 'firm_controller@update_user_firm')->name('store_new_opg');

        Route::get('/user_profile_opg_images' , 'gallery_controller@show_user_opg_images')->name('show_user_opg_images');
        Route::post('/user_profile_opg_images_upload' , 'gallery_controller@save_user_opg_images')->name('save_user_opg_images');
        Route::get('/user_profile_opg_images_delete{id}' , 'gallery_controller@delete_user_opg_images')->name('delete_user_opg_images');

        Route::get('/user_profile_opg_favourite' , 'user_controller@show_user_opg_favourite')->name('show_user_opg_favourite');
});

        Route::group([ 'prefix' => 'user' ,'middleware' => 'auth'], function()
        {
            /*USER OPG CREATE NEW OWNER*/
            Route::get('/create_opg' , 'firm_controller@create_firm')->name('create_opg')->middleware('auth');
            Route::post('/store_opg' , 'firm_controller@store_new_firm')->name('store_new_firm')->middleware('auth');
        });




Route::group([ 'middleware' => 'auth' , 'middleware' => 'verified'], function()
{
    /*MESSAGES*/
        Route::get('/chat_all', 'message_controller@chat_all')->name('chat_all');

        Route::get('/set_up_conversation/{id}/{messsage}', 'message_controller@index')->name('set_up');
        Route::get('/message/{id}' , 'message_controller@getMessage')->name('message');
        Route::post('/message' , 'message_controller@sendMessage');

        Route::get('/delete/last_message/{id}' , 'message_controller@deleteLastMessage')->name('delete_one_message');
});



/*BLOG*/
    /*BLOG-users*/
    Route::get('/blog/{id}' , 'blog_controller@show_blog')->name('show_blog'); //->middleware('verified');
    Route::get('/all_blogs' , 'blog_controller@show_blog_all')->name('blog_all'); //->middleware('verified');


Route::group(['middleware' => 'auth'], function()
{
    /*BLOG-admin*/
        Route::get('/show_blog_save' , 'blog_controller@show_blog_save')->name('show_blog_save');
        Route::post('/save_new_blog_entery' , 'blog_controller@save_new_blog')->name('save_new_blog');
});






/*HUMAN CHECK*/
/*
    Route::get('/human_check' , 'Controller@show_human_check_form')->name('show_human_check_form');
    Route::post('/human_check_secret_number_check' , 'Controller@check_if_you_are_human')->name('check_if_you_are_human');
    Route::post('/create_new_user_if_he_isnt_robot' , 'Controller@create_new_user_if_he_isnt_robot')->name('create_new_user_if_he_isnt_robot');
*/


Auth::routes(['verify' => true]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/login_with_recaptcha' , '\App\Http\Controllers\Auth\LoginController@login_with_recaptcha')->name('login_with_recaptcha');


/*AJAX*/

Route::get('ajax', function(){ return view('ajax'); });
Route::post('/postajax','product_controller@post');




Route::get('/ja' , 'product_controller@help_me');
Route::get('/work' , 'product_controller@work');
