<?php
use App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::get('admin/plans',[Admin\PlanController::class, 'index'])->name('plans.index');

Route::get('/', function () {
    return view('welcome');
});
