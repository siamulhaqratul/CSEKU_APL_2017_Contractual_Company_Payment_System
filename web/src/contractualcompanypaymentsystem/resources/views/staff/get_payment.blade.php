@extends('staff.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
 <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1>Payment</h1><hr>
            <div class="panel panel-default" >


                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>Duty Date</center></th> 
                                <th><center>Status</center></th> 
                            </tr>
                        </thead>
                        <tbody>       
                            @foreach($duty as $staff_duty)
                            <tr>
                                @if(($staff_duty->approved_by_client == 1) &&  ($staff_duty->contract_id == $id)&&($staff_duty->paid == 1)&&($staff_duty->payment_appove_by_staff==1))

                                <td><center>{{$staff_duty->duty_date}}</center></td>
                              
                                <td><center>Received</center></td>

                                @endif
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

       <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> Payment Request</h1><hr>
            <div class="panel panel-default" >
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>Duty Date</center></th> 
                                  <th><center>Status</center></th> 
                               
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>       
                            @foreach($duty as $staff_duty)
                            <tr>
                                @if(($staff_duty->approved_by_client == 1) && ($staff_duty->payment_appove_by_staff==0) && ($staff_duty->contract_id == $id)&&($staff_duty->paid == 1))

                                <td><center>{{$staff_duty->duty_date}}</center></td>
                                <td><center>Unpayed</center></td>
                               <td style="text-align:center">  

                                    <a  onclick="return check()" href="<?=URL::to('staff/confirmpayment',array($staff_duty->id))?>" class="btn btn-primary">
                                      Receive</a>
                                    </td>
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
