<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VaccinController;
use App\Http\Controllers\Auth\Admin\LoginController;
use Illuminate\Support\Facades\Route;



//Admin Login

Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[LoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[LoginController::class, 'login'])->name('admin.login');
});



Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
    Route::get('/',[AdminController::class, 'admin'])->name('admin');

    //Vaccin Section
    Route::resource('/vaccin', App\Http\Controllers\Admin\VaccinController::class);
    Route::post('vaccin_statut', [VaccinController::class, 'vaccinStatut'])->name('vaccin.statut');

});