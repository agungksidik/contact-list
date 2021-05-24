<?php

use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', function() {
    return view('/home');
});

Route::post('logged_in', [LoginController::class, 'authenticate']);

Route::group(['middleware' => 'has.role'], function () {
    Route::view('/dashboard', 'dashboard');
});

Route::group(['middleware' => ['role:super admin|admin']], function () {
    Route::prefix('contact')->group(function () {
        Route::get('', [ContactController::class, 'index'])->name('contact.table');
        Route::get('create', [ContactController::class, 'create'])->name('contact.create');
        Route::get('{contact}/assign', [ContactController::class, 'assign'])->name('contact.assign');
        Route::post('assign_store', [ContactController::class, 'assign_store'])->name('contact.assign.store');
        Route::post('store', [ContactController::class, 'store'])->name('contact.store');
        Route::get('{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
        Route::put('{contact}/update', [ContactController::class, 'update'])->name('contact.update');
        Route::delete('{contact}/delete', [ContactController::class, 'destroy'])->name('contact.delete');
    });
});

Route::group(['middleware' => ['role:super admin|agen']], function () {
    Route::prefix('task')->group(function () {
        Route::get('', [TaskController::class, 'index'])->name('task.table');   
    });
});
