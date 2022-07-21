<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\jobController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\CenterController1;
use \App\Http\Controllers\Admin\reportController;





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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/', \App\Http\Controllers\HomePageController::class);

Route::get('/offer', function () {
    return view('customer.jobs.offers');
});


Route::get('customer/contact-us', function () {
    return view('customer.sale.contact-us');
});

Route::get('/contact-us', function () {
    return view('centerAuth.contact-us');
});


//customer Auth
Route::get('/auth/login',[MainController::class,'login'])->name('auth.login');
Route::get('/auth/register',[MainController::class,'register'])->name('auth.register');
Route::post('/auth/save',[MainController::class,'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class,'check'])->name('auth.check');
Route::get('/customer/dashboard',[MainController::class,'dashboard'])->name('customer.dashboard');
Route::get('/customer/logout',[MainController::class,'logout'])->name('customer.logout');


//admin Login
Route::get('/admin',[\App\Http\Controllers\adminLoginController::class,'login'])->name('admin');
Route::post('/admin/check',[\App\Http\Controllers\adminLoginController::class,'check'])->name('admin.check');
Route::get('/admin/dashboard',[\App\Http\Controllers\adminLoginController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout',[\App\Http\Controllers\adminLoginController::class,'logout'])->name('admin.logout');


//center Auth
Route::get('/center-auth/login',[\App\Http\Controllers\centerLogin::class,'login'])->name('center-auth.login');
Route::get('/center-auth/register',[\App\Http\Controllers\centerLogin::class,'register'])->name('center-auth.register');
Route::post('/center-auth/save',[\App\Http\Controllers\centerLogin::class,'save'])->name('center-auth.save');
Route::post('/center-auth/check',[\App\Http\Controllers\centerLogin::class,'check'])->name('center-auth.check');
Route::get('/center-auth/dashboard',[\App\Http\Controllers\centerLogin::class,'dashboard'])->name('center-auth.dashboard');
Route::get('/customer/logout',[MainController::class,'logout']);

//Customer Area
Route::prefix('/customer')->name('customer.')->group(function(){
    Route::resource('/jobs', \App\Http\Controllers\jobController::class);
    Route::resource('/feedback',\App\Http\Controllers\FeedbackController::class );
    Route::resource('/offers', App\Http\Controllers\customer\OffersController::class);
    Route::get('/profile',[\App\Http\Controllers\customer\CustomerProfileController::class,'index'])->name('customer.profile');
});


//customer sale
Route::get('/customer/sale/',[\App\Http\Controllers\saleController::class,'index'])->name('customer.sale');
Route::get('/customer/sale/addsale',[\App\Http\Controllers\saleController::class,'addSale']);
Route::post('/customer/sale/addsale',[\App\Http\Controllers\saleController::class,'store'])->name('customer.sale.store');
Route::get('/customer/sale/delete/{id}',[\App\Http\Controllers\saleController::class,'Saledelete'])->name('customer.sale.delete');


//center
//Route::get('/vehicle-center',[\App\Http\Controllers\CenterController::class,'index']);
//Route::post('/vehicle-center/offer/{id}',[\App\Http\Controllers\CenterController::class,'offer'])->name('vehicle-center.offer');

//center 1
Route::resource('/vehicle-center', CenterController1::class);

//Route::resource('/admin', \App\Http\Controllers\admin\adminController::class);

//admin controllers
Route::resource('/center', \App\Http\Controllers\admin\repairCenterController::class);
Route::resource('/adminjobs', \App\Http\Controllers\admin\jobController::class);
Route::resource('/carowners', \App\Http\Controllers\admin\CarOwnersController::class);
Route::resource('/carsell', \App\Http\Controllers\admin\CarSellController::class);


//report controllers
Route::get('/admins/reports',[\App\Http\Controllers\Admin\reportController::class,'index']);
Route::get('/admins/reports/down',[\App\Http\Controllers\Admin\reportController::class,'cusreport']);

Route::get('admins/reports/export/', [reportController::class, 'export']);
Route::get('admins/reports/export/', [reportController::class, 'export']);
Route::get('pdf', [\App\Http\Controllers\PdfController::class,'pdfmaker']);


//customer reports
Route::get('customerreport', [\App\Http\Controllers\admin\CustomerReportController::class, 'index'])->name('customerreport');
Route::get('customerreport/record', [\App\Http\Controllers\admin\CustomerReportController::class, 'records'])->name('customerreport/record');

//job reports
Route::get('jobreport', [\App\Http\Controllers\admin\JobReportController::class, 'index'])->name('jobreport');
Route::get('jobreport/record', [\App\Http\Controllers\admin\JobReportController::class, 'records'])->name('jobreport/record');

//Center reports
Route::get('centerreport', [\App\Http\Controllers\admin\CenterReportController::class, 'index'])->name('centerreport');
Route::get('centerreport/record', [\App\Http\Controllers\admin\CenterReportController::class, 'records'])->name('centerreport/record');


Route::get('customer/notifications/read', [\App\Http\Controllers\NotificationController::class,'read'])->name('customer.notifications.read');
Route::get('notifications/read', [\App\Http\Controllers\NotificationControllerCenter::class, 'read'])->name('center.notifications.read');





//offer done
Route::resource('customer/offeraccept', \App\Http\Controllers\AcceptOfferController::class);

//vehicle sale controller
Route::resource('customer/vehicledelete', \App\Http\Controllers\VehicleController::class);

//Payment controller
//Route::resource('customer/payment',\App\Http\Controllers\admin\PaymentController::class);
Route::get('customer/payment', [\App\Http\Controllers\admin\PaymentController::class, 'index'])->name('customer.payment');

