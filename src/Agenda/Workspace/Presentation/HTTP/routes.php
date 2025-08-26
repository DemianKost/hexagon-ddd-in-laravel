<?php

use Src\Agenda\Workspace\Presentation\HTTP\WorkspaceController;

Route::get('/', [WorkspaceController::class, 'index']);
Route::get('/{id}', [WorkspaceController::class, 'show']);
Route::post('/', [WorkspaceController::class, 'store']);
Route::post('/member/add/{id}', [WorkspaceController::class, 'addMember']);
Route::post('/member/remove/{id}', [WorkspaceController::class, 'removeMember']);