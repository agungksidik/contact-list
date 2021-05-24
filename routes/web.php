<?php

use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', function() {
    // $role = Role::find(2);
    // $role->givePermissionTo('create contact', 'edit contact', 'show contact', 'delete contact');

    return view('/home');
});

Route::post('logged_in', [LoginController::class, 'authenticate']);

Route::group(['middleware' => 'has.role'], function () {
    Route::view('/dashboard', 'dashboard');
});

Route::prefix('contact')->group(function () {
    Route::get('', [ContactController::class, 'index']);
    Route::get('create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('store', [ContactController::class, 'store'])->name('contact.store');
    Route::post('delete', [ContactController::class, 'multipleDelete']);

});

