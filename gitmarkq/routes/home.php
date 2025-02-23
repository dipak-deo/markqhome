<?php
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\home\PermalinkController;
use App\Http\Controllers\home\BuildQuitsController;


/**********************************************
 ----------------------------------------------
 ----------------------------------------------


 ------------------HOME ROUTE------------------


 ----------------------------------------------
 ----------------------------------------------
 **********************************************/

 Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    Route::get('detail/{id}/{slug}','detail')->name('home.detail');
    Route::post('contact-submit','contact_post')->name('contact.submit');
    Route::post('property-inquery','property_inquery')->name('home.property-inquery.submit');
 });

 Route::get('/{type}/{id}',[PermalinkController::class,'permalink'])->name('home.permalink');

 Route::prefix('build-quits/step')->controller(BuildQuitsController::class)->group(function(){
    Route::get('start', 'start')->name('home.build-quits.start');
    Route::post('start/submit', 'start_post')->name('home.build-quits.start.post');
    Route::get('step-1', 'step_one')->name('home.build-quits.step_one');
    Route::get('step-1/sub', 'step_one_sub')->name('home.build-quits.step_one.sub');
    Route::get('step-2', 'step_two')->name('home.build-quits.step_two');
    Route::get('step-3', 'step_three')->name('home.build-quits.step_three');
    Route::get('step-4', 'step_four')->name('home.build-quits.step_four');
    Route::get('step-5', 'step_five')->name('home.build-quits.step_five');
    Route::get('step-6', 'step_six')->name('home.build-quits.step_six');
    Route::get('step-7', 'step_seven')->name('home.build-quits.step_seven');
    Route::get('step-8', 'step_eight')->name('home.build-quits.step_eight');
    Route::post('step-8/submit', 'step_eight_post')->name('home.build-quits.step_eight.sumbit');
   //  Route::get('detail/{id}/{slug}', 'detail')->name('home.build-quits.detail');
   //  Route::get('category/{id}/{slug}', 'category')->name('home.build-quits.category');

   Route::post('update-floor-plan','update_floor_plan')->name('update.floor_pan');
 });