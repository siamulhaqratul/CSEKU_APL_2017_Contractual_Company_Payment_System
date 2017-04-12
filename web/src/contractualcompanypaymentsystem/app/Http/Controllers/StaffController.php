<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract_detail;
use App\StuffDuty;
class StaffController extends Controller
{
	public function delete($id){
		$contract= Contract_detail::find($id);
		$contract->staff_id = null;
		$contract->save();    
		return redirect('staff/home');
	}

	public function store($id){
		$contract= Contract_detail::find($id);
		$contract->Active=1;
		$contract->save();

		return redirect('staff/home');

	}

	public function cancelContract($id){

		$contract  = Contract_detail::find($id);
		$contract->Active=1;
		$contract->staff_id = null;
		$contract->save();    
		return redirect('staff/active_contract');
	}
	public function confirmPayment($id){
		$duty=StuffDuty::find($id);

		$duty->payment_appove_by_staff=1;
		$duty->save();

		$id=$duty->contract_id;
		return redirect('staff/get_payment/'.$id);
	}



}
