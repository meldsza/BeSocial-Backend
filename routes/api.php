<?php

use Illuminate\Http\Request;

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
Route::middleware('auth:api')->put('/user', function (Request $request) {
    $request->user()->update($request->all());
    return ['message' => 'Updated'];
});
Route::post('/register', 'Auth\APIRegisterController@create');

Route::apiResource('quest', 'API\QuestController')->middleware('auth:api');
Route::apiResource('questLog', 'API\QuestLogController')->middleware('auth:api');
Route::get('/categories', 'API\CategoryController@index')->middleware('auth:api');
Route::get('/my_quests', 'API\QuestController@myQuests')->middleware('auth:api');
Route::post('/questLog/{questLog}/completed', 'API\QuestLogController@completed')->middleware('auth:api');
Route::get('/my_quest_logs', 'API\QuestLogController@myQuestLogs')->middleware('auth:api');

Route::post('/nGO/', 'API\NGOController@store')->middleware('auth:api');
