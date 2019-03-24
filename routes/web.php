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
Route::group(['namespace'=>'frontend'],function (){
   Route::get('/','pagesController@index')->name('index');
   Route::get('/about','pagesController@about')->name('fabout');
   Route::get('/chairman-msg','pagesController@chairman_msg')->name('chairman_msg');
    Route::get('/executive-msg','pagesController@executive_msg')->name('executive_msg');
    Route::get('/tour','pagesController@tour')->name('ftour');
    Route::get('/tour-details/{slug}','pagesController@tour_details')->name('tour_details');
    Route::get('/one-day-tour','pagesController@one_day')->name('one_day');
    Route::get('/daytour-details/{slug}','pagesController@daytour_details')->name('daytour_details');
    Route::get('/india-tour','pagesController@india_tour')->name('findia_tour');
    Route::get('/india-tour-details/{slug}','pagesController@indiatour_details')->name('indiatour_details');
    Route::get('/adventure','pagesController@adventure')->name('fadventure');
    Route::get('/adventure-details/{slug}','pagesController@adventure_details')->name('adventure_details');
    Route::get('/ticketing','pagesController@ticketing')->name('fticketing');
    Route::get('/company','pagesController@company')->name('company');
    Route::get('/company-details/{slug}','pagesController@company_details')->name('company_details');
    Route::get('/gallery','pagesController@gallery')->name('fgallery');
    Route::get('/contact','pagesController@contact')->name('contact');





});





Route::group(['namespace'=>'backend','prefix'=>'dashboard'],function(){
    Route::post('/logout', 'adminController@logout')->name('logout');
    Route::get('/@dashboard@', 'adminController@login')->name('login');
    Route::post('login', 'adminController@login_action')->name('login_action');
    Route::get('/settings','pagesController@settings')->name('settings');
    Route::post('/companydetail_action','pagesController@companydetail_action')->name('companydetail_action');
    Route::post('/branch-action','pagesController@branch_action')->name('branch_action');
    Route::post('/branch-add','pagesController@branch_add')->name('branch_add');
    Route::post('/seo','pagesController@seo_action')->name('seo_action');
    Route::post('/associates-add','pagesController@associates_add')->name('associates_add');
    Route::post('/associates-del','pagesController@associates_del')->name('associates_del');
    Route::post('/social-site','pagesController@social_action')->name('social_action');
    Route::get('/tour','pagesController@tour')->name('tour');
    Route::post('/tour-action','pagesController@tour_action')->name('tour_action');
    Route::post('/tour-delete','pagesController@tour_del')->name('tour_del');
    Route::get('/tour-edit','pagesController@tour_edit')->name('tour_edit');
    Route::post('/tour-edit','pagesController@touredit_action')->name('touredit_action');
    Route::post('/tour-scroll','pagesController@tourscroll_del')->name('tourscroll_del');
    Route::post('/tour-itenerary-delete','pagesController@touritenerary_del')->name('touritenerary_del');
    Route::post('/tour-itenerary','pagesController@touriteedit_action')->name('touriteedit_action');
    Route::post('/tourset','pagesController@tourset')->name('tourset');
    Route::post('/tour-trip','pagesController@tourtripedit_action')->name('tourtripedit_action');

    /*///////one day tour/////////////////*/
    Route::get('/day-tour','pagesController@day_tour')->name('day_tour');
    Route::post('/day-tour','pagesController@daytour_action')->name('daytour_action');
    Route::post('/daytour_del','pagesController@daytour_del')->name('daytour_del');
    Route::get('/day-tour-edit','pagesController@daytour_edit')->name('daytour_edit');
    Route::post('/day-tour-edit','pagesController@daytouredit_action')->name('daytouredit_action');
    Route::post('/daytour-itenerary','pagesController@daytouriteedit_action')->name('daytouriteedit_action');
    Route::post('/daytouritenerary_del','pagesController@daytouritenerary_del')->name('daytouritenerary_del');
    Route::post('/daytourscroll_del','pagesController@daytourscroll_del')->name('daytourscroll_del');
    Route::post('/daytourset','pagesController@daytourset')->name('daytourset');
    Route::post('/daytour-trip','pagesController@daytripedit_action')->name('daytripedit_action');


    /*//////////adventure////////////////////*/
    Route::get('/adventure','pagesController@adventure')->name('adventure');
    Route::post('/adventure','pagesController@adventure_action')->name('adventure_action');
    Route::post('/adventure_del','pagesController@adventure_del')->name('adventure_del');
    Route::get('/adventure-edit','pagesController@adventure_edit')->name('adventure_edit');
    Route::post('/adventure-edit','pagesController@adventureedit_action')->name('adventureedit_action');
    Route::post('/adveniteedit_action','pagesController@adveniteedit_action')->name('adveniteedit_action');
    Route::post('/adventure-itenerary','pagesController@advenitenerary_del')->name('advenitenerary_del');
    Route::post('/advenscroll_del','pagesController@advenscroll_del')->name('advenscroll_del');
    Route::post('/advenset','pagesController@advenset')->name('advenset');
    Route::post('/adventure-trip','pagesController@adventripedit_action')->name('adventripedit_action');


    /*/////////////////india tour//////////////*/
   Route::get('/india-tour','pagesController@india_tour')->name('india_tour');
    Route::post('/india-tour','pagesController@india_action')->name('india_action');
    Route::get('/india-edit','pagesController@india_edit')->name('india_edit');
    Route::post('/india-edit','pagesController@indiaedit_action')->name('indiaedit_action');
    Route::post('/india-itenerary','pagesController@indiaiteedit_action')->name('indiaiteedit_action');
    Route::post('/india-delete','pagesController@india_del')->name('india_del');
    Route::post('/india-itenerary-del','pagesController@indiaitenerary_del')->name('indiaitenerary_del');
    Route::post('/india-scroll-del','pagesController@indiascroll_del')->name('indiascroll_del');
    Route::post('/indiaset','pagesController@indiaset')->name('indiaset');



    /*////////////company//////////////////*/
    Route::get('/our-company','pagesController@company')->name('company');
    Route::post('/our-company','pagesController@company_action')->name('company_action');
    Route::get('/company-edit','pagesController@company_edit')->name('company_edit');
    Route::post('/company-edit','pagesController@companyedit_action')->name('companyedit_action');
    Route::post('/company-delete','pagesController@company_del')->name('company_del');

    /*///////////about us//////////////////*/
    Route::get('/about','pagesController@about')->name('about');
    Route::post('/introduction','pagesController@intro_action')->name('intro_action');
    Route::post('/chairman-message','pagesController@ceo_message')->name('ceo_action');
    Route::post('/director-message','pagesController@direc_message')->name('direc_action');

    /*////////////airlines//////////////////*/
    Route::get('/airlines','pagesController@airlines')->name('airlines');
    Route::post('airlines','pagesController@airlines_action')->name('airlines_action');
    Route::post('/airline-delete','pagesController@airline_del')->name('airline_del');

    /*///////////testimonial/////////////////*/
    Route::get('/testimonial','pagesController@testimonial')->name('testimonial');
    Route::post('/testimonial','pagesController@testimonial_action')->name('testimonial_action');
    Route::get('/testimonial-edit','pagesController@testimonial_edit')->name('testimonial_edit');
    Route::post('/testimonial-edit','pagesController@testimonialedit_action')->name('testimonialedit_action');
    Route::post('/testimonial-delete','pagesController@testimonial_del')->name('testimonial_del');

    /*/////////////ticketing/////////////////*/
    Route::get('/ticketing','pagesController@ticketing')->name('ticketing');
    Route::post('/ticketing','pagesController@ticketing_action')->name('ticketing_action');

    /*////////////gallery/////////////////////*/
    Route::get('/gallery','pagesController@gallery')->name('gallery');
    Route::post('/gallery','pagesController@gallery_action')->name('gallery_action');
    Route::post('/gallery-delete','pagesController@gallery_del')->name('gallery_del');

    /*/////////affiliation///////////////*/
    Route::get('/affiliation','pagesController@affiliation')->name('affiliation');
    Route::post('/affiliation','pagesController@affiliation_action')->name('affiliation_action');

    /*/////////////////slider//////////////////*/
    Route::get('/slider','pagesController@slider')->name('slider');
    Route::post('/slider','pagesController@slider_action')->name('slider_action');
    Route::post('/slider-delete','pagesController@slider_del')->name('slider_del');


});



Route::group(['namespace'=>'backend','middleware'=>'auth','prefix'=>'dashboard'],function() {
    Route::get('/', 'adminController@dashboard')->name('dashboard');
    Route::get('register', 'adminController@register')->name('register');
    Route::post('register', 'adminController@register_action')->name('register_action');
    Route::get('/profile', 'adminController@profile')->name('profile');
    Route::get('/edit_userprofile', 'adminController@edit_userprofile')->name('edit_userprofile');
    Route::post('/edit_userprofile', 'adminController@userprofile_action')->name('userprofile_action');
    Route::get('/edit_adminprofile', 'adminController@edit_adminprofile')->name('edit_adminprofile');
    Route::post('/edit_adminprofile', 'adminController@adminprofile_action')->name('adminprofile_action');
    Route::post('/profile_del', 'adminController@profile_del')->name('profile_del');
    Route::post('/passwprd', 'adminController@password_action')->name('password_action');

});




//..................frontend.......................

