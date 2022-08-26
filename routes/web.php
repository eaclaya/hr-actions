<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HRActionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('App');
});
Route::post('/employees/validate', [EmployeeController::class, 'validateEmployee'])->name('employees.validate');
Route::group(['middleware' => 'employee_auth'], function(){
	Route::post('/employees/logout', [EmployeeController::class, 'logoutEmployee'])->name('employees.logout');
	Route::resource('actions', HRActionController::class);	
});






