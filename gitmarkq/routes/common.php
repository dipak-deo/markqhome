<?php
use App\Http\Controllers\common\DashboardController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\common\UserController;
use App\Http\Controllers\common\CategoryController;
use App\Http\Controllers\common\SliderController;
use App\Http\Controllers\common\SettingController;
use App\Http\Controllers\common\PageController;
use App\Http\Controllers\common\EmailTemplateController;
use App\Http\Controllers\common\SupportController;
use App\Http\Controllers\common\PageProtectController;
use App\Http\Controllers\common\PostController;
use App\Http\Controllers\common\FaqController;
use App\Http\Controllers\common\SkipAdsController;
use App\Http\Controllers\common\MenuController;
use App\Http\Controllers\common\TeamCategoryController;
use App\Http\Controllers\common\TeamController;


 Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.index');


    Route::prefix('category-management')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::get('create',[CategoryController::class,'create'])->name('category.create');
        Route::post('store',[CategoryController::class,'store'])->name('category.store');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    });
    
    
    Route::prefix('post-management')->group(function(){
        Route::get('/',[PostController::class,'index'])->name('post.index');
        Route::get('create',[PostController::class,'create'])->name('post.create');
        Route::post('store',[PostController::class,'store'])->name('post.store');
        Route::get('edit/{id}',[PostController::class,'edit'])->name('post.edit');
        Route::post('update/{id}',[PostController::class,'update'])->name('post.update');
        Route::get('delete/{id}',[PostController::class,'delete'])->name('post.delete');
    });
    
    
    Route::prefix('user-management')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('user.index');
        Route::get('create',[UserController::class,'create'])->name('user.create');
        Route::post('store',[UserController::class,'store'])->name('user.store');
        Route::get('edit/{id}',[UserController::class,'edit'])->name('user.edit');
        Route::post('update/{id}',[UserController::class,'update'])->name('user.update');
        Route::get('delete/{id}',[UserController::class,'delete'])->name('user.delete');
    
        Route::get('admin-all',[UserController::class,'admin_all'])->name('admin.all');
        Route::get('blocked-user',[UserController::class,'blocked_user'])->name('blocked.user');
    });
    
    
    Route::prefix('slider-management')->group(function(){
        Route::get('/',[SliderController::class,'index'])->name('slider.index');
        Route::get('create',[SliderController::class,'create'])->name('slider.create');
        Route::post('store',[SliderController::class,'store'])->name('slider.store');
        Route::get('edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
        Route::post('update/{id}',[SliderController::class,'update'])->name('slider.update');
        Route::get('delete/{id}',[SliderController::class,'delete'])->name('slider.delete');
    });
    
    Route::prefix('setting-management')->group(function(){
        Route::any('site-setting',[SettingController::class,'site_setting'])->name('site.setting');
    });
    
    Route::prefix('profile-management')->group(function(){
        Route::get('edit-profile',[AuthController::class,'updateProfile'])->name('admin.profile');
        Route::post('edit-profile/submit',[AuthController::class,'updateProfileSubmit'])->name('admin.profile.submit');
        Route::get('change-password',[AuthController::class,'changePassword'])->name('admin.change.password');
        Route::post('change-password/submit',[AuthController::class,'changePasswordSubmit'])->name('admin.change.password.submit');
     });

     Route::prefix('support-management')->group(function(){
        Route::get('index',[SupportController::class,'index'])->name('support.index');
        Route::get('show/{id}',[SupportController::class,'show'])->name('support.show');
        Route::post('update/{id}',[SupportController::class,'update'])->name('support.update');
    });

    Route::prefix('page-protection-management')->group(function(){
        Route::get('index',[PageProtectController::class,'index'])->name('page_protection.index');
        Route::get('create',[PageProtectController::class,'create'])->name('page_protection.create');
        Route::post('store',[PageProtectController::class,'store'])->name('page_protection.store');
        Route::get('delete/{id}',[PageProtectController::class,'delete'])->name('page_protection.delete');
    });

    Route::prefix('email-template-management')->group(function(){
        Route::get('/',[EmailTemplateController::class,'index'])->name('email_template.index');
        Route::get('create',[EmailTemplateController::class,'create'])->name('email_template.create');
        Route::post('store',[EmailTemplateController::class,'store'])->name('email_template.store');
        Route::get('edit/{id}',[EmailTemplateController::class,'edit'])->name('email_template.edit');
        Route::post('update/{id}',[EmailTemplateController::class,'update'])->name('email_template.update');
        Route::get('delete/{id}',[EmailTemplateController::class,'delete'])->name('email_template.delete');
    });

    Route::prefix('page-management')->group(function(){
        Route::get('/',[PageController::class,'index'])->name('page.index');
        Route::get('create',[PageController::class,'create'])->name('page.create');
        Route::post('store',[PageController::class,'store'])->name('page.store');
        Route::get('edit/{id}',[PageController::class,'edit'])->name('page.edit');
        Route::post('update/{id}',[PageController::class,'update'])->name('page.update');
        Route::get('delete/{id}',[PageController::class,'delete'])->name('page.delete')->middleware('page_protection');
        Route::get('get-template-cat',[PageController::class,'data_category'])->name('page.get.template.cat');
    });


    Route::prefix('faq-management')->group(function(){
        Route::get('/',[FaqController::class,'index'])->name('faq.index');
        Route::get('create',[FaqController::class,'create'])->name('faq.create');
        Route::post('store',[FaqController::class,'store'])->name('faq.store');
        Route::get('edit/{id}',[FaqController::class,'edit'])->name('faq.edit');
        Route::post('update/{id}',[FaqController::class,'update'])->name('faq.update');
        Route::get('delete/{id}',[FaqController::class,'delete'])->name('faq.delete');
    });

    Route::prefix('skipads-management')->group(function(){
        Route::get('/',[SkipAdsController::class,'index'])->name('skipads.index');
        Route::get('create',[SkipAdsController::class,'create'])->name('skipads.create');
        Route::post('store',[SkipAdsController::class,'store'])->name('skipads.store');
        Route::get('edit/{id}',[SkipAdsController::class,'edit'])->name('skipads.edit');
        Route::post('update/{id}',[SkipAdsController::class,'update'])->name('skipads.update');
        Route::get('delete/{id}',[SkipAdsController::class,'delete'])->name('skipads.delete');
    });


    Route::prefix('menu-management')->group(function(){
        Route::get('/',[MenuController::class,'index'])->name('menu.index');
        Route::get('edit/{id}',[MenuController::class,'edit'])->name('menu.edit');
        Route::post('store', [MenuController::class, 'store'])->name('menu.store');
        Route::post('update/menu/{id}',[MenuController::class,'update'])->name('menu.update');

        Route::post('store/menu-block/{menu_id}',[MenuController::class,'store_menu_block'])->name('menu.block.store');

        Route::post('store/menu-items/',[MenuController::class,'menu_items'])->name('menu.items.store');
        Route::get('delete/menu/{id}', [MenuController::class, 'delete'])->name('menu.delete');
        Route::get('edit-menu-block',[MenuController::class,'edit_menu_block'])->name('edit.menu.block');
        Route::get('menu/block/items/delete/{id}',[MenuController::class,'menu_block_items_delete'])->name('delete.menu.block.items');

        Route::post('update/menu-block/{id}', [MenuController::class, 'update_menu_block'])->name('menu.block.update');
        Route::get('delete/menu-block/{id}', [MenuController::class, 'delete_menu_block'])->name('menu.block.delete');
       
       Route::get('megha-menu-header/{id}',[MenuController::class,'megha_menu_header'])->name('menu.megha_menu_block');
       Route::post('megha-menu-header/update/{menu_id}', [MenuController::class, 'megha_menu_header_update'])->name('menu.megha_menu_block.update'); 
       
       Route::post('menu-buttons/update',[MenuController::class,'menu_buttons'])->name('menu.buttons.update');

       Route::post('menu-items-description',[MenuController::class,'items_description'])->name('menu.items.description');
    });

    Route::prefix('team-management')->group(function(){
        Route::get('/',[TeamController::class,'index'])->name('team.index');
        Route::get('create',[TeamController::class,'create'])->name('team.create');
        Route::post('store',[TeamController::class,'store'])->name('team.store');
        Route::get('edit/{id}',[TeamController::class,'edit'])->name('team.edit');
        Route::post('update/{id}',[TeamController::class,'update'])->name('team.update');
        Route::get('delete/{id}',[TeamController::class,'delete'])->name('team.delete');
    
        Route::prefix('category')->name('team.category.')->group(function(){
            Route::get('/', [TeamCategoryController::class, 'index'])->name('index');
            Route::get('create', [TeamCategoryController::class, 'create'])->name('create');
            Route::post('store', [TeamCategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [TeamCategoryController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [TeamCategoryController::class, 'update'])->name('update');
            Route::get('delete/{id}', [TeamCategoryController::class, 'delete'])->name('delete');      
        });
    });


 });