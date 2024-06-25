<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/','IndexController@index')->name('index');
    Route::get('/about','IndexController@about')->name('about');
    Route::get('/portfolio','IndexController@portfolio')->name('portfolio');
    Route::get('/contact','IndexController@contact')->name('contact');
    Route::get('/switch-style{color}','IndexController@switchStyle')->name('switchStyle');
   
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    Route::match(['get','post'],'/','LoginController@login')->name('login');
    Route::get('logout','LoginController@logout')->name('logout');
    Route::get('ForgetPassword','AdminController@ForgetPassword')->name('ForgetPassword');
    Route::post('ForgetPasswordPost','AdminController@ForgetPasswordPost')->name('ForgetPasswordPost');
    Route::get('reset-password/{token}/{email}','AdminController@ForgetResetPassword')->name('ForgetResetPassword');
    Route::post('reset-password-post','AdminController@ResetPasswordPost')->name('ResetPasswordPost');
    Route::post('contactUS-post','AdminController@contactUS')->name('contactUS');

    Route::get('profile','AdminController@profile')->name('profile');
    Route::get('profile-edit/{id}/edit','AdminController@profile_edit')->name('profile_edit');
    Route::put('profile-update/{id}','AdminController@profile_update')->name('profile_update');

    Route::group(['middleware' => ['auth']],function(){
        Route::get('dashboard','AdminController@dashboard')->name('dashboard');
        Route::resource('skils', 'SkilController')->except('show');
        Route::resource('educations', 'EducationController')->except('show');
        Route::resource('portfolios', 'ProtfolioController')->except('show');
        Route::resource('experiences', 'ExperienceController')->except('show');
        Route::resource('contacts', 'ContactController');
        Route::get('support','AdminController@support')->name('support');

    });
  
});

