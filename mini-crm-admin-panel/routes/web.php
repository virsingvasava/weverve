<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotpasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function ($router) {

    Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
    Route::post('/submit', [LoginController::class, 'submit'])->name('login.submit');

    Route::get('/forgot-password', [ForgotpasswordController::class, 'index'])->name('forgot_password');
	Route::post('/forgot-password/submit', [ForgotpasswordController::class, 'submit'])->name('forgot_password.submit');
	
	Route::get('/reset-password/{token}', [ForgotpasswordController::class, 'reset_password'])->name('auth.reset_password');
	Route::post('/password/submit', [ForgotpasswordController::class, 'password_submit'])->name('password.submit');

});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin' , 'prefix' => 'admin'], function ($router) {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'profile'], function ($router) {
		Route::get('/', [ProfileController::class, 'profile'])->name('admin.profile.index');
		Route::post('/update', [ProfileController::class, 'profile_update'])->name('admin.profile.update');
	});

	Route::group(['prefix' => 'change-password'], function ($router) {
		Route::get('/', [ProfileController::class, 'change_password'])->name('admin.change_password');
		Route::post('/update', [ProfileController::class, 'change_password_submit'])->name('admin.change_password.update');
	});

	Route::group(['prefix' => 'company'], function(){
		Route::get('/', [CompanyController::class, 'index'])->name('admin.company.index');
		Route::get('/create', [CompanyController::class, 'create'])->name('admin.company.create');
		Route::post('/store', [CompanyController::class, 'store'])->name('admin.company.store');
		Route::post('/delete', [CompanyController::class, 'delete'])->name('admin.company.delete');
		Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('admin.company.edit');
		Route::get('/view/{id}', [CompanyController::class, 'view'])->name('admin.company.view');
		Route::post('/update', [CompanyController::class, 'update'])->name('admin.company.update');
		Route::post('/status-update', [CompanyController::class, 'company_status_update'])->name('admin.company.company_status_update');

	});

	Route::group(['prefix' => 'employee'], function(){
		Route::get('/', [EmployeeController::class, 'index'])->name('admin.employee.index');
		Route::get('/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
		Route::post('/store', [EmployeeController::class, 'store'])->name('admin.employee.store');
		Route::post('/delete', [EmployeeController::class, 'delete'])->name('admin.employee.delete');
		Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
		Route::get('/view/{id}', [EmployeeController::class, 'view'])->name('admin.employee.view');
		Route::post('/update', [EmployeeController::class, 'update'])->name('admin.employee.update');
		Route::post('/status-update', [EmployeeController::class, 'employee_status_update'])->name('admin.employee.employee_status_update');

	});

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
