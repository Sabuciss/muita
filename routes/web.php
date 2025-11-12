<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\InspectionsController;
use App\Http\Controllers\PartiesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehiclesController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/cases', [CasesController::class, 'showDataFromJson']);

Route::get('/documents', [DocumentsController::class, 'showDataFromJson']);

Route::get('/inspections', [InspectionsController::class, 'showDataFromJson']);

Route::get('/parties', [PartiesController::class, 'showDataFromJson']);

Route::get('/users', [UsersController::class, 'showDataFromJson']);

Route::get('/vehicles', [VehiclesController::class, 'showDataFromJson']);

