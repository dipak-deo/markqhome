<?php
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\TeamCategoryController;
use App\Http\Controllers\admin\propertyTypeController;
use App\Http\Controllers\admin\PropertyCategoryController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\TestmonialController;
use App\Http\Controllers\admin\HomeSectionController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\PropertyInqueryController;
use App\Http\Controllers\admin\BuildQuitController;




Route::middleware(AdminMiddleware::class)->group(function(){
    require_once __DIR__.'/common.php';


/**********************************************
 ----------------------------------------------
 ----------------------------------------------


 ------------------ADMIN ROUTE------------------


 ----------------------------------------------
 ----------------------------------------------
 **********************************************/

    Route::prefix('property-management')->group(function(){
        Route::prefix('type')->controller(propertyTypeController::class)->group(function(){
            Route::get('/','index')->name('admin.property.type.index');
            Route::get('/create','create')->name('admin.property.type.create');
            Route::post('/store','store')->name('admin.property.type.store');
            Route::get('/edit/{id}','edit')->name('admin.property.type.edit');
            Route::post('/update/{id}','update')->name('admin.property.type.update');
            Route::get('/delete/{id}','delete')->name('admin.property.type.delete');
        });

        Route::prefix('category')->controller(PropertyCategoryController::class)->group(function(){
            Route::get('/', 'index')->name('admin.property.category.index');
            Route::get('/create', 'create')->name('admin.property.category.create');
            Route::post('/store', 'store')->name('admin.property.category.store');
            Route::get('/edit/{id}', 'edit')->name('admin.property.category.edit');
            Route::post('/update/{id}', 'update')->name('admin.property.category.update');
            Route::get('/delete/{id}', 'delete')->name('admin.property.category.delete');
           
        });

        Route::get('/', [PropertyController::class, 'index'])->name('admin.property.index');
        Route::get('/create', [PropertyController::class, 'create'])->name('admin.property.create');
        Route::post('/store', [PropertyController::class, 'store'])->name('admin.property.store');
        Route::get('/edit/{id}', [PropertyController::class, 'edit'])->name('admin.property.edit');
        Route::post('/update/{id}', [PropertyController::class, 'update'])->name('admin.property.update');
        Route::get('/delete/{id}', [PropertyController::class, 'delete'])->name('admin.property.delete');
        Route::get('delete-image/{type}',[PropertyController::class,'delete_image'])->name('remove.property.image');


        Route::get('edit-group/{edit_type}/{id}',[PropertyController::class,'edit_group'])->name('admin.property.edit.group');
        Route::post('update-group/{edit_type}/{id}', [PropertyController::class, 'update_group'])->name('admin.property.update.group');
        Route::get('delete-group/{edit_type}/items/{id}', [PropertyController::class, 'delete_group_items'])->name('admin.property.delete.group');
        Route::post('update-group/{edit_type}/items/{id}', [PropertyController::class, 'update_group_items'])->name('admin.property.update.group.items');
    });

    Route::prefix('testmonial-management')->controller(TestmonialController::class)->group(function(){
        Route::get('/', 'index')->name('admin.testmonial.index');
        Route::get('/create', 'create')->name('admin.testmonial.create');
        Route::post('/store', 'store')->name('admin.testmonial.store');
        Route::get('/edit/{id}', 'edit')->name('admin.testmonial.edit');
        Route::post('/update/{id}', 'update')->name('admin.testmonial.update');
        Route::get('/delete/{id}', 'delete')->name('admin.testmonial.delete');
    });

    Route::prefix('home-section')->controller(HomeSectionController::class)->group(function(){
        Route::get('/', 'index')->name('admin.home.section.index');
        // Route::get('/create', 'create')->name('admin.home.section.create');
        // Route::post('/store', 'store')->name('admin.home.section.store');
        Route::get('/edit/{slug}', 'edit')->name('admin.home.section.edit');
        Route::post('/update/{slug}', 'update')->name('admin.home.section.update');
        Route::get('/delete/{id}', 'delete')->name('admin.home.section.delete');
    });

    Route::get('admin/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('admin/contact/show/{id}', [ContactController::class, 'show'])->name('admin.contact.show');

    Route::get('admin/property-inquery',[PropertyInqueryController::class,'index'])->name('admin.property.inquery.index');
    Route::get('admin/property-inquery/show/{id}', [PropertyInqueryController::class, 'show'])->name('admin.property.inquery.show');

    // build quiets management

    Route::get('admin/build-quit', [BuildQuitController::class, 'index'])->name('admin.build.quit.index');
    Route::get('admin/build-quit/show/{id}', [BuildQuitController::class, 'show'])->name('admin.build.quit.show');

});


   