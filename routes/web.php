<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::get('/showdoctor',[AdminController::class,'showdoctor']);
Route::get('/showuser',[AdminController::class,'showuser']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);
Route::get('/approved/{id}',[AdminController::class,'approved']);
Route::get('/canceled/{id}',[AdminController::class,'canceled']);
Route::get('/showappointment',[AdminController::class,'showappointment']);
Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor']);
Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);
Route::get('/deleted/{id}',[AdminController::class,'deleted']);
Route::get('/emailview/{id}',[AdminController::class,'emailview']);
Route::get('/email_contact_view/{id}',[AdminController::class,'email_contact_view']);
Route::get('/deleteuser/{id}',[AdminController::class,'deleteuser']);
Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']);
Route::post('/sendmail/{id}',[AdminController::class,'sendmail']);
Route::post('/sendmail_contact/{id}',[AdminController::class,'sendmail_contact']);
Route::post('/upload_new',[AdminController::class,'upload_new']);
Route::get('/makenews',[AdminController::class,'makenews']);
Route::get('/allnews',[AdminController::class,'allnews']);
Route::get('/deletenew/{id}',[AdminController::class,'deletenew']);
Route::get('/message',[AdminController::class,'message']);
Route::get('/deletemessage/{id}',[AdminController::class,'deletemessage']);
Route::get('/deleteimage/{id}',[AdminController::class,'deleteimage']);
Route::get('/addimage',[AdminController::class,'addimage']);
Route::get('/imageview',[AdminController::class,'imageview']);
Route::post('/contact',[HomeController::class,'contact']);
Route::post('/upload_image',[AdminController::class,'upload_image']);
