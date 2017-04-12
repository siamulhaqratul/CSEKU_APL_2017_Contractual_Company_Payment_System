@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

    <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1>Received Payment</h1><hr>
            <div class="panel panel-default" >
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Contract Id</th> 
                                <th>Payment Serial</th>  
                                <th>Paid Amount</th> 
                                <th>Date</th> 
                        
                            </tr>
                        </thead>
                        <tbody>       
                           @foreach($clinent_payments as $clinent_payment)
                            <tr>
                                @if($clinent_payment->approved_by_manager==1 && $clinent_payment->contract_id== $id)

                                <td><center>{{$clinent_payment->contract_id}}</center></td>
                               <td> <center>{{$clinent_payment->payment_serial}}</center></td>
                               
                                <td><center>{{$clinent_payment->amount_paid}}</center></td>
                          
                                <td><center>{{$clinent_payment->date}}</center></td>

                                    @endif
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


       <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1>Get Payment</h1><hr>
            <div class="panel panel-default" >
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Contract Id</th> 
                                <th>Payment Serial</th>  
                                <th>Paid Amount</th> 
                                <th>Date</th> 
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>       
                           @foreach($clinent_payments as $clinent_payment)
                            <tr>
                                @if($clinent_payment->approved_by_manager==0 && $clinent_payment->contract_id== $id)

                                <td><center>{{$clinent_payment->contract_id}}</center></td>
                               <td> <center>{{$clinent_payment->payment_serial}}</center></td>
                               
                                <td><center>{{$clinent_payment->amount_paid}}</center></td>
                          
                                <td><center>{{$clinent_payment->date}}</center></td>
                                
                                <td style="text-align:center">  <center>
                                    <a  href="<?=URL::to('admin/dogetmany',array($clinent_payment->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Receive</a></center>
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
