@extends('client.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> Active Contract</h1><hr>
            <div class="panel panel-default" >

               <!--  <div class="panel-heading">User Listing</div> -->
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Staff Name</th>   
                                <th>Phone Number</th> 
                                <th>Payment</th> 
                                <th style="text-align:center">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>       
                        @foreach($users->client_detail as $contract_details)
                            <tr>
                               @if($contract_details->Active == 1)
                                <td><center>{{$contract_details->staff->name}}</center></td>
                                <td><center>{{$contract_details->staff->contact_no}}</center></td>
                                <td><center>{{$contract_details->payment_for_staff_monthly}}</center></td>
                                
                                 <td><center>
                                     <a  href="<?=URL::to('client/active_contract_delete',array($contract_details->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Cancel</a>
                                    <a  href="<?=URL::to('client/send_many',array($contract_details->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Send Payment</a>
                                    </center>
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
