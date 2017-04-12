<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract_detail;
use App\Client_payment;
use Auth;

class ClientController extends Controller
{
   public function store(Request $request){
   $contract_detail= new Contract_detail();
   $contract_detail->monthly_workingday=$request->monthly_workingday;
   $contract_detail->client_id=Auth::user()->id;
   $date=$request->start_date;
   $date = str_replace('/', '-', $date);
   $date = strtotime($date);
   $new_date=date('Y-m-d', $date);

   $contract_detail->start_date=$new_date;
   $contract_detail->payment_from_client_monthly=$request->payment_from_client_monthly;
   $contract_detail->month_limit=$request->month_limit;
   $contract_detail->save();
   
   return redirect('client/home');
 }


  public function active_contract_delete($id){
   Contract_detail::find($id)->delete();    
      return redirect('client/home');
  }


  public function send_many(Request $request){
   $client_payment= new Client_payment();
   $client_payment->contract_id=$request->contract_id;
   $client_payment->payment_serial=$request->payment_serial;
   $client_payment->amount_paid=$request->amount_paid;
   $date=$request->date;
   $date = str_replace('/', '-', $date);
   $date = strtotime($date);
   $new_date=date('Y-m-d', $date);
   $client_payment->date=$new_date;
   $client_payment->save();
   //var_dump($date);
   return redirect('client/home');
 }


 
}
