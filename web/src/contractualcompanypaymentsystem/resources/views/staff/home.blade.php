@extends('staff.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> Contract Request</h1><hr>
            <div class="panel panel-default" >

               <!--  <div class="panel-heading">User Listing</div> -->
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Client Name</th>   
                                <th>Phone Number</th> 
                                <th>Payment</th> 
                                <th>Starting Date</th> 
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>       
                        
                        @foreach($users->contract_detail as $contract_detail)
                            <tr>
                               @if($contract_detail->Active != 1)
                                <td><center>{{$contract_detail->client->name}}</center></td>
                                <td><center>{{$contract_detail->client->contact_no}}</center></td>
                                <td><center>{{$contract_detail->payment_for_staff_monthly}}</center></td>
                                <td><center>{{$contract_detail->start_date}}</center></td>
                                
                               
                                <td style="text-align:center">  

                                    <a  href="<?=URL::to('staff/accept',array($contract_detail->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Accept</a>

                                    <a  onclick="return check()" href="<?=URL::to('staff/delete',array($contract_detail->id))?>" class="btn btn-danger">

                                        <span class="glyphicon glyphicon-trash"></span>Detete</a>
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