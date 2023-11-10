<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\userController;
use App\Http\Middleware\tokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Back-End::
//Authentication back-end routes::

Route::post('/userRegistration',[userController::class,'userRegistration']);
Route::post('/userLogin',[userController::class,'userLogin']);
Route::post('/sendOTP',[userController::class,'sendOtp']); 
Route::post('/varifyOTP',[userController::class,'verifyOtp']);
Route::post('/resetPassword',[userController::class,'resetPassword'])->middleware([tokenVerificationMiddleware::class]);


//Dashboard back-end routes::
Route::get('/logoutUser',[dashController::class,'LogoutUser']);
Route::get('/userProfile',[dashController::class,'Userprofile'])->middleware(tokenVerificationMiddleware::class);  
Route::post('/updateProfile',[dashController::class,'Updateprofile'])->middleware(tokenVerificationMiddleware::class); 


//Category back-end routes::
Route::get('/categoryList',[categoryController::class,'CategoryList'])->middleware(tokenVerificationMiddleware::class);
Route::post('/categoryCreate',[categoryController::class,'CategoryCreate'])->middleware(tokenVerificationMiddleware::class);
Route::post('/categoryUpdate',[categoryController::class,'CategoryUpdate'])->middleware(tokenVerificationMiddleware::class);
Route::post('/categoryDelete',[categoryController::class,'CategoryDelete'])->middleware(tokenVerificationMiddleware::class);






//Front-End::
//Authentication front-end routes::
Route::get('/',[userController::class,'homepage']);
Route::get('/Login',[userController::class,'loginPage']);
Route::get('/Registration',[userController::class,'registrationPage']);
Route::get('/Sendotp',[userController::class,'sendotpPage']);
Route::get('/Verifyotp',[userController::class,'verifyotpPage']);
Route::get('/Resetpassword',[userController::class,'resetpasswordPage'])->middleware([tokenVerificationMiddleware::class]);

//Dashboard front-end routes::
Route::get('/Dashhome',[dashController::class,'dashsumPage'])->middleware([tokenVerificationMiddleware::class]);
Route::get('/Userprofile',[dashController::class,'profilePage'])->middleware([tokenVerificationMiddleware::class]);

//Category front-end routes::

Route::get('/Categorypage',[categoryController::class,'CategoryPage'])->middleware(tokenVerificationMiddleware::class);