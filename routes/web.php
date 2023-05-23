<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\taskController;
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
Route::get('/',[LayoutController::class, 'welcome']);
Route::get('/login', [LayoutController::class, 'login']);
Route::get('/register', [LayoutController::class, 'register']);
// Route::get('/dashboard', [LayoutController::class, 'dashboard']);
// Route::get('/users', [LayoutController::class, 'allusers']);
Route::get('/assign-supervisor', [LayoutController::class, 'dashboard']);
Route::get('/managetask', [taskController::class, 'managetask']);
Route::get('/assign-task', [taskController::class, 'assignTask']);
Route::get('/groups', [LayoutController::class, 'existingGroup']);
Route::get('/deleteGroup/{id}', [LayoutController::class , 'deleteGroup'] );

Route::get('/create-group', [LayoutController::class, 'groupCreate']);
Route::get('/create-member', [LayoutController::class, 'groupMember']);
Route::get('/create-member/{id}', [LayoutController::class, 'groupMemberCreate']);
Route::get('/group-task', [taskController::class, 'groupTask']);

Route::post('/store-register', [AuthController::class, 'registerStore']);
Route::post('/store-login', [AuthController::class, 'loginStore']);
// Route::get('/logout', [AuthController::class, 'logout']);
// Route::get('/approve-user/{id}',[AuthController::class, 'approve']);



// private route
Route::middleware(['CheckLoggedIn'])->group(function () {
    Route::get('/dashboard', [LayoutController::class, 'dashboard']);
    
    Route::middleware(['CheckAdmin'])->group(function () {
        Route::get('/users', [LayoutController::class, 'allusers']);
        Route::get('/approve-user/{id}',[AuthController::class, 'approve']);
        Route::get('/delete/{id}',[AuthController::class, 'deleteUser']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/edit-user/{id}', [AuthController::class, 'edit']);
Route::post('/update-user/{id}', [AuthController::class, 'update']);
Route::get('/editgroups/{id}', [LayoutController::class , 'editAllgroups'] );
Route::post('/updategroups/{id}', [LayoutController::class , 'updateAllgroups'] );

Route::get('/editTask/{id}', [taskController::class , 'editAllTask'] );
Route::post('/updatetask/{id}', [taskController::class , 'updateAlltask'] );
Route::get('/deleteTask/{id}',[taskController::class, 'deleteTask']);

Route::post('/store-group', [LayoutController::class, 'groupStore']);
Route::post('/store-member', [LayoutController::class, 'storeMembers']);
Route::post('/store-task', [taskController::class, 'taskStore']);
Route::post('/store-update-task', [taskController::class, 'taskUpdateStore']);
