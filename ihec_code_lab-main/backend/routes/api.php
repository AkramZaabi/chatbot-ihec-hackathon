<?php

use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\ReportsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/getReports",[ReportsController::class,"getReports"]);
Route::post("/AddReport",action: [ReportsController::class,"ReportsNew"]);

Route::post("/AddFeedBack",action: [FeedBackController::class,"AddFeedBack"]);
Route::get("/getFeedBacks",action: [FeedBackController::class,"getFeedBacks"]);
Route::delete("/DeleteFeedBack/{id}",action: [FeedBackController::class,"DeleteFeedBack"]);



