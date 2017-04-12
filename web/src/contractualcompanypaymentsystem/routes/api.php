<?php

use Illuminate\Http\Request;
use App\Contract_detail;
use App\StuffDuty;
use App\User;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/all/user', function () {
     $users=User::all();
     return response()->json($users);
});

Route::get('/get/user/{id}', function ($id) {
     $users=User::find($id);
     return response()->json($users);
});


Route::get('/all/contract_details', function () {
     $contract_details=Contract_detail::all();
     return response()->json($contract_details);
});
Route::post('stuff_duty/store','StuffDutyController@create_stuff_duty');

Route::get('stuff_duty/store/client/{id}','StuffDutyController@approve');


Route::get('/getuser/{id}','StuffDutyController@getuser');

//all/pendigduty




Route::get('all/pendingduty', function () {

	$duty = StuffDuty::all();
     
     return response()->json($duty);
});



Route::get('all/pendingdutys', function () {

	$duty = StuffDuty::all();
     
     return response()->json($duty);
});