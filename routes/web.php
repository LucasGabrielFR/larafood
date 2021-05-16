<?php
use App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;



Route::prefix('admin')
    ->group(function(){

    /**
     * Routes Profiles
     */

    Route::get('profiles',[Admin\ProfileController::class, 'index'])->name('profiles.index');
    Route::post('profiles',[Admin\ProfileController::class, 'store'])->name('profiles.store');
    Route::put('profiles/{id}',[Admin\ProfileController::class, 'update'])->name('profiles.update');
    Route::get('profiles/create',[Admin\ProfileController::class, 'create'])->name('profiles.create');
    Route::get('profiles/{url}',[Admin\ProfileController::class, 'show'])->name('profiles.show');
    Route::get('profiles/{url}/edit',[Admin\ProfileController::class, 'edit'])->name('profiles.edit');
    Route::delete('profiles/{url}',[Admin\ProfileController::class, 'destroy'])->name('profiles.destroy');
    /**
     * Routes Plans
     */

    Route::get('plans',[Admin\PlanController::class, 'index'])->name('plans.index');
    Route::post('plans',[Admin\PlanController::class, 'store'])->name('plans.store');
    Route::put('plans/{id}',[Admin\PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/create',[Admin\PlanController::class, 'create'])->name('plans.create');
    Route::get('plans/{url}',[Admin\PlanController::class, 'show'])->name('plans.show');
    Route::get('plans/{url}/edit',[Admin\PlanController::class, 'edit'])->name('plans.edit');
    Route::delete('plans/{url}',[Admin\PlanController::class, 'destroy'])->name('plans.destroy');

    /**
     * Home Dashboard
     */
    Route::get('/',[Admin\PlanController::class, 'index'])->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
