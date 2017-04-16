<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contract_detail;
use App\Client_payment;
use App\StuffDuty;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
	  use AuthenticatesUsers;


    public function edit($id){
		$user= User::find($id)->where('id',$id)->first();    
		return view('admin.edit',compact('user'));
	}
	public function update($id){
		
		$user= User::find($id);
		$user->approve=1;
		$user->save();
		return redirect('admin/user_request');
	}

	public function closeContract($id){
  
       $staff_duties = StuffDuty::all();

       foreach ($staff_duties as $staff_duty) {
       	
       		if($id == $staff_duty->contract_id && $staff_duty->approved_by_client == 1 && $staff_duty->paid ==0){

       			return redirect('admin/sorry');
       		}

       }

       $contract_details = Contract_detail::find($id);
       $contract_details->staff_id=null;
       $contract_details->client_id=null;
       $contract_details->save();
       return redirect('admin/active_contract');


	}
	public function delete($id){


		$contract_details = Contract_detail::all();

       foreach ($contract_details as $contract_detail) {
       	
       		if((($contract_detail->staff_id == $id)|| ($contract_detail->client_id == $id))){

       			return redirect('admin/sorry2');
       		}

       }


		User::find($id)->delete();    
		return redirect('admin/active_user');
	}

	public function sendPayment($id){
		$duty=StuffDuty::find($id);

		$duty->paid=1;
  		$duty->save();
  		$id=$duty->contract_id;
		return redirect('admin/send_payment/'.$id);
	}

	public function deleteUnregisteredUser($id){

		User::find($id)->delete();    
		return redirect('admin/user_request');

	}


 	public function disable($id){

 		$contract_details = Contract_detail::all();

       foreach ($contract_details as $contract_detail) {
       	
       		if((($contract_detail->staff_id == $id)|| ($contract_detail->client_id == $id))){

       			return redirect('admin/sorry3');
       		}
       	}


        $user= User::find($id);
		$user->approve=0;
		$user->save();

		return redirect('admin/active_user');

	}

		public function store(Request $request){
		$id=$request->id;
		$contract_details=Contract_detail::find($id);
		$contract_details->staff_id=$request->staff_id;
		$contract_details->payment_for_staff_monthly=$request->payment_for_staff_monthly;
		
		$contract_details->save();
		return redirect('admin/home');
}


  public  function login(Request $request){
        if ($this->attemptLogin($request)) {
            $id=Auth::user()->id;
            $user=User::find($id);
            return response()->json($user);
        }

        return  "Sorry";
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            ['username' => $request->username, 'password' =>$request->password,'approve' => 1],$request->has('remember')
        );
    }



    public  function active_contract_delete($id){
    	$contract_details=Contract_detail::find($id);
		$contract_details->staff_id=null;
		$contract_details->save();    
		return redirect('admin/active_contract');
    }

    public function getMany ($id){
    	$client_payment=Client_payment::find($id);
    	$client_payment->approved_by_manager=1;
    	$client_payment->save();
        return redirect('admin/active_contract');


    }

    public function cancelPendingRequest($id){

		$contract_details=Contract_detail::find($id);
		$contract_details->staff_id=null;
		$contract_details->payment_for_staff_monthly=null;
		
		$contract_details->save();
		return redirect('admin/pending');
    }

   

}
