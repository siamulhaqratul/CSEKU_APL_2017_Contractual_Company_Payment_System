<?php 
      use App\User;

      use App\Contract_detail;
?>

@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
 <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <?php 

               $staff=User::find($id);
               $staff_name= $staff->name;

             ?>

            <h1>Staff Payment History</h1><hr>

            <div class="panel-heading">Staff Name : {{$staff_name}}</div>

            <div class="panel panel-default" >
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>Contract ID</center></th>
                                 <th><center>Served Client</center></th>   
                                <th><center>Duty Date</center></th>
                                <th><center>Amount Paid</center></th>  

                            </tr>
                        </thead>
                        <tbody>       
                            @foreach($duty as $staff_duty)
                            <tr>
                                @if($staff_duty->paid == 1)
                                <?php 
                                $flag = 0;
                                $contractid = $staff_duty->contract_id;

                                $contract = Contract_detail::find($contractid);

                                if($id == $contract->staff_id){
                                    $flag=1;
                                    $payment = ($contract->payment_for_staff_monthly)/($contract->monthly_workingday);

                                    $clientId = $contract->client_id;
                                    $clientName = User::find($clientId)->name;

                                    $payment = ceil($payment);
                                }

                                 ?>

                                @if($flag == 1)

                                <td><center>{{$staff_duty->contract_id}}</center></td>
                                <td><CENTER>{{$clientName}}</CENTER></td>

                                <?php

                                        $date = strtotime($staff_duty->duty_date);

                                       $new_date=date("d-m-Y", $date); 

                                 ?>
                                <td><center>{{$new_date}}</center></td>
                                <td><center>{{$payment}}</center></td>

                                @endif


                                @endif
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
