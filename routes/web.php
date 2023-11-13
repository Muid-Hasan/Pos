<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashController;
use App\Http\Controllers\userController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\customerController;
use App\Http\Middleware\tokenVerificationMiddleware;

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
Route::post('/categoryById',[categoryController::class,'CategoryById'])->middleware(tokenVerificationMiddleware::class);    


//Customer back-end routes::
Route::get('/customerList',[customerController::class,'CustomerList'])->middleware(tokenVerificationMiddleware::class);
Route::post('/customerCreate',[customerController::class,'CreateCustomer'])->middleware(tokenVerificationMiddleware::class);
Route::post('/customerUpdate',[customerController::class,'UpdateCustomer'])->middleware(tokenVerificationMiddleware::class);
Route::post('/customerDelete',[customerController::class,'DeleteCustomer'])->middleware(tokenVerificationMiddleware::class);
Route::post('customerById',[customerController::class,'CustomerById'])->middleware(tokenVerificationMiddleware::class);





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


//Customer front-end routes::

Route::get('/Customer',[customerController::class,'CustomerPage'])->middleware(tokenVerificationMiddleware::class);