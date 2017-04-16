<?php 

use App\Contract_detail;
use App\StuffDuty;

 ?>


@extends('staff.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1>Active Contract</h1><hr>
            <div class="panel panel-default" >

               <!--  <div class="panel-heading">User Listing</div> -->
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cl Name</th>   
                                <th>Phone Number</th> 
                                <th>Payment</th> 
                                <th>Starting Date</th> 
                                <th style="text-align:center">Month Limit</th>
                                <th style="text-align:center">Action</th>
                                <th style="text-align:center">Receive Payment</th>
                                <th style="text-align: center"> Status </th>
                            </tr>
                        </thead>
                        <tbody>       
                        
                        @foreach($users->contract_detail as $contract_details)
                            <tr>
                            
                               @if(($contract_details->Active == 1) && (!empty($contract_details->client_id)))
                                <td><center>{{$contract_details->client->name}}</center></td>
                                <td><center>{{$contract_details->client->contact_no}}</center></td>
                                <td><center>{{$contract_details->payment_for_staff_monthly}}</center></td>
                                <td><center>{{$contract_details->start_date}}</center></td>
                                <td><center>{{$contract_details->month_limit}}</center></td>
                                <td style="text-align: center"> <a  onclick="return check()" href="<?=URL::to('staff/cancelcontract',array($contract_details->id))?>" class="btn btn-danger">
                                       Cancel</a> </td>


                                <td><center>

                                    


                                       <?php

                                      $flag =0; 

                                       $staff1 = StuffDuty::all();

                                       foreach ($staff1 as $duty) {
                                            if($duty->paid ==1 && $duty->payment_appove_by_staff==0 && $duty->contract_id == $contract_details->id){
                                                $flag = 1;
                                                break;
                                            }
                                        } 

                                        ?>
                                
                                 @if($flag == 1)
                                    <a  href="<?=URL::to('staff/get_payment',array($contract_details->id))?>"  class="btn btn-primary">Received Payment</a>
                                @else
                                    <a  href="<?=URL::to('staff/get_payment',array($contract_details->id))?>"  class="btn btn-primary disabled">Received Payment</a>

                                @endif



                                </center></td>
                                @endif

                                <td><CENTER>
                                    
                                     <a  href="<?=URL::to('staff/see_history',array($contract_details->id))?>"  class="btn btn-primary">Payment History</a>

                                </CENTER></td>
                                  
                                @endforeach
                           
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection