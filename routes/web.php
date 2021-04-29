<?php
use App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::get('admin',[Admin\PlanController::class, 'index'])->name('admin.index');

Route::get('admin/plans',[Admin\PlanController::class, 'index'])->name('plans.index');
Route::post('admin/plans',[Admin\PlanController::class, 'store'])->name('plans.store');
Route::put('admin/plans/{id}',[Admin\PlanController::class, 'update'])->name('plans.update');
Route::get('admin/plans/create',[Admin\PlanController::class, 'create'])->name('plans.create');
Route::get('admin/plans/{url}',[Admin\PlanController::class, 'show'])->name('plans.show');
Route::get('admin/plans/{url}/edit',[Admin\PlanController::class, 'edit'])->name('plans.edit');
Route::delete('admin/plans/{url}',[Admin\PlanController::class, 'destroy'])->name('plans.destroy');

Route::get('/', function () {
    return view('welcome');
});
