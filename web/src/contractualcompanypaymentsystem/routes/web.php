
<?php
use App\User;
use App\Contract_detail;
use App\Client_payment;
use App\StuffDuty;
use Illuminate\Http\Request;
/*
|------
--------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//admin routs

Route::group(['middleware' => 'auth'], function () {
	Route::get('/admin/home', function () {

        $id=Auth::user()->id;
        $admin=User::find($id);
		$users=User::all();

        $contract_details=Contract_detail::all();
        if($admin->rolename=="Admin"){
	    return view('admin.home',compact('users','contract_details'));
    }
	});
    ///admin/stuff

    Route::get('admin/stuff/{id}', function ($id) {
        $duty=StuffDuty::all();
        $contract_details = Contract_detail::all();
        return view('admin.staff',compact('duty','id','contract_details'));
});

    Route::get('admin/client/{id}', function ($id) {

        $clinent_payments = Client_payment::all();
        
        return view('admin.client',compact('id','clinent_payments'));
});


Route::get('admin/send_payment/{id}', function ($id) {
		$duty=StuffDuty::all();
	    return view('admin.send_payment',compact('duty','id'));
});

Route::get('admin/user_request', function () {
        $users=User::all();
        return view('admin.user_request',compact('users'));
});

Route::get('admin/pending', function () {


       $contract_details=Contract_detail::all();

        return view('admin.pending_contract',compact('contract_details'));
});

///admin/economical_status

Route::get('admin/economical_status', function () {


       $contract_details=Contract_detail::all();
       $stuff_dutys = StuffDuty::all();
       $clinent_payments = Client_payment::all();

        return view('admin.economical_status',compact('contract_details','stuff_dutys','clinent_payments'));
});

//admin/economical/story

Route::post('admin/economical/story', function (Request $request) {


       $contract_details=Contract_detail::all();
       $stuff_dutys = StuffDuty::all();
       $clinent_payments = Client_payment::all();
       $startDate1 = $request->start_date;
       $endDate1 = $request->end_date;

        return view('admin.economical_status_in_range',compact('contract_details','stuff_dutys','clinent_payments','startDate1','endDate1'));
});


Route::get('admin/active_user', function () {

       $users=User::all();
        return view('admin.active_user',compact('users'));
});






/// See history

Route::get('admin/see_history/{id}', function ($id) {

       $duty = StuffDuty::all();

        $id1=Auth::user()->id;
        $admin=User::find($id1);

        $data1 = "Sort Ascending";
        $data = "Sort Ascending";
        

        if($admin->rolename == "Admin"){

        return view('admin.see_history',compact('duty','id','data','data1'));
    }
});


Route::get('admin/see_history/des/date/{id}', function ($id) {

       $duty = StuffDuty::orderBy('duty_date', 'DESC')->get();

        $id1=Auth::user()->id;
        $admin=User::find($id1);
        $data = "Sort Ascending";
        $data1 = "Sort Descending";

        if($admin->rolename == "Admin"){
         return view('admin.see_history',compact('duty','id','data','data1'));
    }
});



Route::get('admin/see_history/asc/app/{id}', function ($id) {

       $duty = StuffDuty::orderBy('approved_by_client', 'ASC')->get();

        $id1=Auth::user()->id;
        $admin=User::find($id1);
        $data = "Sort Descending";
        $data1 = "Sort Descending";
        if($admin->rolename == "Admin"){
        return view('admin.see_history',compact('duty','id','data','data1'));
    }
});


Route::get('admin/see_history/dsc/app/{id}', function ($id) {

       $duty = StuffDuty::orderBy('approved_by_client', 'DESC')->get();

        $id1=Auth::user()->id;
        $admin=User::find($id1);
        $data = "Sort Ascending";
        $data1 = "Sort Descending";

        if($admin->rolename == "Admin"){
        return view('admin.see_history',compact('duty','id','data','data1'));
    }
});

//admin/see_history

//sendpayment


Route::get('admin/sendpayment/{id}','AdminController@sendPayment');


Route::get('admin/home/user_delete/{id}','AdminController@delete');
Route::get('admin/home/user_disable/{id}','AdminController@disable');

Route::get('admin/cancel_pending_request/{id}','AdminController@cancelPendingRequest');


Route::get('admin/home/user_edit/{id}','AdminController@edit');
Route::get('admin/home/user_update/{id}','AdminController@update');
Route::get('admin/home/deleteunregistereduser/{id}','AdminController@deleteUnregisteredUser');

////Active Contract
Route::get('admin/active_contract/', function () { 

    $clinent_payments = Client_payment::all();
    $contract_details=Contract_detail::all();  
    return view('admin.active_contract',compact('contract_details','clinent_payments'));
});

Route::get('admin/get_payment/{id}', function ($id) { 
    $clinent_payments=Client_payment::all();  
    return view('admin.get_payment',compact('clinent_payments','id'));
});

Route::get('admin/dogetmany/{id}','AdminController@getMany');


Route::get('admin/active_contract_delete/{id}','AdminController@active_contract_delete');


Route::get('admin/closecontract/{id}','AdminController@closeContract');




Route::get('admin/send_request/{id}', function ($id) {
        $contract_detail=Contract_detail::find($id);
        $users=User::all();
        return view('admin.send_request',compact('contract_detail','users'));
});
Route::get('admin/sorry', function () {

        return view('admin.sorry');
});
Route::get('admin/sorry2', function () {

        return view('admin.sorry2');
});
Route::get('admin/sorry3', function () {

        return view('admin.sorry3');
});

 Route::post('admin/send_request/store/','AdminController@store');


//// end admin routes




/// client routs


Route::get('/client/home', function () {
    $id=Auth::user()->id;
    $users=User::find($id);
    return view('client/home',compact('users'));
});

//client/see_histoy

Route::get('client/see_history/{id}', function ($id) {
    $clinent_payments = Client_payment::all();
    return view('client/history',compact('clinent_payments','id'));
});


Route::get('/client/make_contract', function () {
    return view('client/make_contract');

});

Route::get('/client/send_many/{id}', function ($id) {
    return view('client/payment',compact('id'));

});

Route::post('/client/make_contract/store','ClientController@store');

Route::post('/client/dosend_many','ClientController@send_many');

// Route::get('/client/active_contract', function () {
//     return view('client/active_contract');
// });

Route::get('client/active_contract_delete/{id}','ClientController@active_contract_delete');

/// end client routs



///Staff Routs
Route::get('staff/see_history/{id}', function ($id) {

    $stuffduties=StuffDuty::all();
    return view('staff/status',compact('stuffduties','id'));
});


Route::get('/staff/home', function () {
    $id=Auth::user()->id;
    $users=User::find($id);
    return view('staff/home',compact('users'));
});

Route::get('staff/active_contract',function(){
    $id=Auth::user()->id;
    $users=User::find($id);
    return view('staff/active_contract',compact('users'));
});

Route::get('staff/get_payment/{id}', function ($id) {
        $duty=StuffDuty::all();
        return view('staff.get_payment',compact('duty','id'));
});


Route::get('/staff/accept/{id}','StaffController@store');

Route::get('/staff/delete/{id}','StaffController@delete');

Route::get('staff/confirmpayment/{id}','StaffController@confirmPayment');

Route::get('staff/cancelcontract/{id}','StaffController@cancelContract');

});




Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::get('/home', function () {
    return view('home');
});

Route::post('admin/login','AdminController@login');