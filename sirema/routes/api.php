<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/requests/{user_id}', [RequestController::class, 'listRequestByUser']);
Route::get('/requests/personil/{user_id}', [RequestController::class, 'listRequestByPersonil']);
Route::get('/projects/personil/{user_id}', [RequestController::class, 'listProjectByPersonil']);
Route::get('/admin/requests', [RequestController::class, 'getAllRequests']);
Route::delete('/requests/delete/{id}', [RequestController::class, 'delete'])->name('requests.delete');

Route::get('/user-calendar-events/{user_id}', [CalendarController::class, 'userCalendar']);
Route::get('/personil-calendar-events/{user_id}', [CalendarController::class, 'personilCalendar']);
Route::get('/admin-calendar-events', [CalendarController::class, 'adminCalendar']);

Route::get('/fetch-personil', [AdminController::class, 'fetchPersonilData'])->name('fetch.personil');
Route::get('/admin/dashboard-data', [AdminController::class, 'dashboardData']);
Route::get('/admin/data-users', [AdminController::class, 'getUsersData'])->name('users.data');
Route::get('/count-personil', [RequestController::class, 'countPersonils'])->name('count.personil');
