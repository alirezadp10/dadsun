<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::patch('company/{company}',[CompanyController::class,'update'])->name('company.update')->middleware(['auth','edit.information']);
Route::post('company',[CompanyController::class,'store'])->name('company.store')->middleware(['auth']);
Route::delete('company/{company}',[CompanyController::class,'destroy'])->name('company.destroy');
Route::get('company/edit/{company}',[CompanyController::class,'edit'])->name('company.edit')->middleware(['auth','edit.information']);
Route::get('company/create',[CompanyController::class,'create'])->name('company.create')->middleware(['auth']);
Route::get('company/{company}',[CompanyController::class,'show'])->name('company.show');
Route::get('company',[CompanyController::class,'index'])->name('company.index');

Route::patch('employee/{employee}',[EmployeeController::class,'update'])->name('employee.update')->middleware(['auth','edit.information']);
Route::post('employee',[EmployeeController::class,'store'])->name('employee.store')->middleware(['auth']);
Route::delete('employee/{employee}',[EmployeeController::class,'destroy'])->name('employee.destroy');
Route::get('employee/edit/{employee}',[EmployeeController::class,'edit'])->name('employee.edit')->middleware(['auth','edit.information']);
Route::get('employee/create',[EmployeeController::class,'create'])->name('employee.create')->middleware(['auth']);
Route::get('employee/{employee}',[EmployeeController::class,'show'])->name('employee.show');
Route::get('employee',[EmployeeController::class,'index'])->name('employee.index');
