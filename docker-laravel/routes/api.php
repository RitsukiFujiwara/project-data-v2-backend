<?php

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

Route::group(['middleware' => 'api'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/refresh', 'AuthController@refresh');
});

// Route::group(['middleware' => 'auth:api'], function () {
Route::post('/logout', 'AuthController@logout');
Route::post('/mypage', 'Mypage\MypageController@index');
//言語取得API
Route::get('/program', 'Program\ProgramController@search');
//言語登録API
Route::post('/program', 'Program\ProgramController@register');
//言語更新API
Route::put('/program', 'Program\ProgramController@update');
//フレームワーク取得API
Route::get('/framework', 'Framework\FrameworkController@search');
//フレームワーク登録API
Route::post('/framework', 'Framework\FrameworkController@register');
//フレームワーク更新API
Route::put('/framework', 'Framework\FrameworkController@update');
//DB取得API
Route::get('/database', 'Database\DatabaseController@search');
//DB登録API
Route::post('/database', 'Database\DatabaseController@register');
//DB更新API
Route::put('/database', 'Database\DatabaseController@update');
//資格取得API
Route::get('/license', 'License\LicenseController@search');
//資格登録API
Route::post('/license', 'License\LicenseController@register');
//資格更新API
Route::put('/license', 'License\LicenseController@update');
// });
//プロジェクト取得API
Route::get('/project', 'Project\ProjectController@search');
//プロジェクト登録API
Route::post('/project', 'Project\ProjectController@register');
//プロジェクト更新API
Route::put('/project', 'Project\ProjectController@update');
