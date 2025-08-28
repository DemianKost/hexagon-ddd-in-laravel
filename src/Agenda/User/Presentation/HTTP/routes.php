<?php

use Illuminate\Support\Facades\Route;
use Src\Agenda\User\Presentation\HTTP\UserController;

Route::get('/', [UserController::class, 'index']);
Route::post('/', [UserController::class, 'store']);