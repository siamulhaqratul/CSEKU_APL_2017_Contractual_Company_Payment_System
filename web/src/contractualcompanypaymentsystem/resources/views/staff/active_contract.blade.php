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
                            </tr>
                        </thead>
                        <tbody>       
                        
                        @foreach($users->contract_detail as $contract_details)
                            <tr>
                               @if($contract_details->Active == 1)
                                <td><center>{{$contract_details->client->name}}</center></td>
                                <td><center>{{$contract_details->client->contact_no}}</center></td>
                                <td><center>{{$contract_details->payment_for_staff_monthly}}</center></td>
                                <td><center>{{$contract_details->start_date}}</center></td>
                                <td><center>{{$contract_details->month_limit}}</center></td>


                                <td><center>
                                    
                                      <a  onclick="return check()" href="<?=URL::to('staff/cancelcontract',array($contract_details->id))?>" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>Cancel</a>
                                
                                 
                                    <a  href="<?=URL::to('staff/get_payment',array($contract_details->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Get Payment</a>
                                </center></td>
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