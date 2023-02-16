<?php

use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ACL\{
    ProfileController,
    PermissionController,
    PermissionProfileController
};
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
Route::prefix('admin')->group(function () {


    /*
     * Routes Permissions_PROFILE
     *
     * */
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionProfile'])
        ->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionAvailable'])
        ->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])
        ->name('profiles.permissions');


    /*
     * Routes Permissions
     *
     * */
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resource('permissions', PermissionController::class);

    /*
     * Routes Profiles
     *
     * */
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::resource('profiles', ProfileController::class);

    /*
     * Routes Details Plans
     *
     * */
    Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');


    /*
     * Routes Plan
     * */
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');

    /*
     * Routes dashboard
     * */
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');

});

Route::get('/', function () {
    return view('welcome');
});
