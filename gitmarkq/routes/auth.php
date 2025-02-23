<?php 
use App\Http\Controllers\auth\AuthController;

/**********************************************
 ----------------------------------------------
 ----------------------------------------------


 ------------------AUTH ROUTE------------------


 ----------------------------------------------
 ----------------------------------------------
 **********************************************/

 Route::get('admin/login',[AuthController::class,'admin_login'])->name('admin.login');
 Route::post('admin/login', [AuthController::class, 'admin_login_post'])->name('admin.login.submit');



 Route::get('logout', [AuthController::class, 'logout'])->name('logout');


