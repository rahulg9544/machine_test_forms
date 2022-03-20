<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HtmlFieldController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'html_fields/',
], function () {
    Route::get('/', [HtmlFieldController::class, 'index']);
    Route::get('/list-forms', [HtmlFieldController::class, 'list_form']);
    Route::get('/{form}', [HtmlFieldController::class, 'show']);
    Route::post('/', [HtmlFieldController::class, 'store']);
    Route::put('/{form}', [HtmlFieldController::class, 'update']);
    Route::delete('/{form}', [HtmlFieldController::class, 'destroy']);
    
});

