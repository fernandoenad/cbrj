<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\App\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\App\Admin\DepartmentController as AdminDepartment;
use App\Http\Controllers\App\Admin\PositionController as AdminPosition;

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

Route::get('/',[HomepageController::class, 'index'])->name('homepage.index');
Route::get('/about-us',[HomepageController::class, 'aboutus'])->name('homepage.aboutus');
Route::get('/products',[HomepageController::class, 'products'])->name('homepage.products');
Route::get('/contact-us',[HomepageController::class, 'contactus'])->name('homepage.contactus');

Auth::routes(['register' => false]);

Route::get('/app/admin', [AdminDashboard::class, 'index'])->name('app.admin.index');

Route::get('/app/admin/departments', [AdminDepartment::class, 'index'])->name('app.admin.departments.index');
Route::get('/app/admin/departments/create', [AdminDepartment::class, 'create'])->name('app.admin.departments.create');
Route::post('/app/admin/departments', [AdminDepartment::class, 'store'])->name('app.admin.departments.store');
Route::delete('/app/admin/departments/{department}', [AdminDepartment::class, 'destroy'])->name('app.admin.departments.destroy');
Route::get('/app/admin/departments/{department}', [AdminDepartment::class, 'modify'])->name('app.admin.departments.modify');
Route::put('/app/admin/departments/{department}', [AdminDepartment::class, 'update'])->name('app.admin.departments.update');

Route::get('/app/admin/positions', [AdminPosition::class, 'index'])->name('app.admin.positions.index');
Route::get('/app/admin/positions/create', [AdminPosition::class, 'create'])->name('app.admin.positions.create');
Route::post('/app/admin/positions', [AdminPosition::class, 'store'])->name('app.admin.positions.store');
Route::delete('/app/admin/positions/{position}', [AdminPosition::class, 'destroy'])->name('app.admin.positions.destroy');
Route::get('/app/admin/positions/{position}', [AdminPosition::class, 'modify'])->name('app.admin.positions.modify');
Route::put('/app/admin/positions/{position}', [AdminPosition::class, 'update'])->name('app.admin.positions.update');