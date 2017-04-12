@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> User Request</h1><hr>
            <div class="panel panel-default" >

                <div class="panel-heading">User Listing</div>
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Staff Name</th> 
                                <th>Client Name</th>  
                                <th>Working Day</th> 
                                <th>Payment</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>       
                            @foreach($contract_details as $contract_detail)
                            <tr>
                                @if($contract_detail->Active == 0 && !empty($contract_detail->staff_id)) 

                                <td>{{$contract_detail->staff->name}}</td>
                                <td>{{$contract_detail->client->name}}</td>
                                <td>{{$contract_detail->monthly_workingday}}</td>
                                <td>{{$contract_detail->payment_from_client_monthly}}</td>
                               <td style="text-align:center">  

                                    <a  onclick="return check()" href="<?=URL::to('admin/cancel_pending_request',array($contract_detail->id))?>" class="btn btn-danger">

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
