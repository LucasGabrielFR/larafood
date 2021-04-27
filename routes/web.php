<?php
use App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::get('admin/plans',[Admin\PlanController::class, 'index'])->name('plans.index');
Route::post('admin/plans',[Admin\PlanController::class, 'store'])->name('plans.store');
Route::get('admin/plans/create',[Admin\PlanController::class, 'create'])->name('plans.create');
Route::get('admin/plans/{url}',[Admin\PlanController::class, 'show'])->name('plans.show');
Route::delete('admin/plans/{url}',[Admin\PlanController::class, 'destroy'])->name('plans.destroy');

Route::get('/', function () {
    return view('welcome');
});
