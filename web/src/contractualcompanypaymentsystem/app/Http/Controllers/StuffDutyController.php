<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StuffDuty;


class StuffDutyController extends Controller
{
    public function index(){
 
        $stuffduty  = StuffDuty::all();
 
        return response()->json($stuffduty);
 
    }
 
    public function getstuff_duty($id){
 
        $stuffduty  = StuffDuty::find($id);
 
        return response()->json($stuffduty);
    }
 
    public function create_stuff_duty(Request $request){

        $date2 = $request->duty_date;

        $date2 = strtotime($date2);

        $stuffdutys = StuffDuty::all();

        foreach ($stuffdutys as $s) {

            $d = $s->duty_date;

            $d= strtotime($d);

            if($d == $date2 && $s->contract_id == $request->contract_id){
                return  $d;
            }


            
        }



        $stuffduty = new StuffDuty();
        $stuffduty->contract_id=$request->contract_id;
        $date=$request->duty_date;
        $date = strtotime($date);

        $new_date=date("Y-m-d", $date);
        $stuffduty->duty_date=$new_date;

        $date1=$request->next_date;
        $date1 = str_replace('/', '-', $date1);
        $date1 = strtotime($date1);
        $new_date1=date("Y-m-d", $date1);
        $stuffduty->next_date=$new_date1;
        $stuffduty->save();
        return "Submitted";
    }

        public function approve($id){

        $stuffduty = StuffDuty::find($id);

        $stuffduty->approved_by_client = 1;
        $stuffduty->save();

        if( $stuffduty->approved_by_client == 1){
            return "Submitted";
        }


        // $rContract_id=$request->contract_id;

        // $date=$request->duty_date;
        // $date = strtotime($date);
        // $new_date=date("Y-m-d", $date);

        // $date1 = strtotime($new_date);



        // foreach ($stuffdutys as $stuffduty) {
            
        //     if($stuffduty->contract_id == $rContract_id && $date1 == strtotime($stuffduty->duty_date))
        //     {

        //         $stuffduty->approved_by_client=1;

        //          $stuffduty->save();

        //         return "Sumitted";

        //     }

        //    //return response()->json($stuffduty->duty_date);
        // }
       
      return "Error";
    }
 //1489017600 1491004800
    public function deletestuffduty($id){
        $stuffduty  = StuffDuty::find($id);
        $stuffduty->delete();

        return response()->json('deleted');
    }
 
    public function updatestuffduty(Request $request,$id){
        $stuffduty  = StuffDuty::find($id);
        $stuffduty->title = $request->input('title');
        $stuffduty->author = $request->input('author');
        $stuffduty->isbn = $request->input('isbn');
        $stuffduty->save();
 
        return "Sumitted";
    }
}
