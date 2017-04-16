@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> Active Contract</h1><hr>
            <div class="panel panel-default" >
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>Client Name</center></th> 
                                <th><center>Staff Name</center></th>  
                                <th><center>Action</center></th> 
                                <th style="text-align:center">Payment</th>
                                <th style="text-align:center">History</th>
                            </tr>
                        </thead>
                        <tbody>       
                           @foreach($contract_details as $contract_detail)
                            <tr>
                                @if($contract_detail->Active==1 && $contract_detail->staff_id != null && $contract_detail->client_id != null) 
                                <td><center>{{$contract_detail->client->name}}</center></td>
                                <td><center>{{$contract_detail->staff->name}}</center></td>
                                <td style="text-align:center">  
                                    <a  onclick="return delete()" href="<?=URL::to('admin/closecontract',array($contract_detail->id))?>" class="btn btn-danger">Close</a>
                                </td>

                                 <td style="text-align:center">  


                                 <?php  
                                 $flag =0;


                                 ?>


                                @foreach($clinent_payments as $clinent_payment)


                                
                               @if(($contract_detail->id == $clinent_payment->contract_id) 
                               &&  ($clinent_payment->approved_by_manager == 0))

                               <?php 
                                $flag=1;

                               ?>
                               
                                   
                                    @break
                                    @endif
                                @endforeach

                                @if($flag == 1)


                                 <a  href="<?=URL::to('admin/get_payment',array($contract_detail->id))?>"  class="btn btn-primary active">Receive Payment</a>
                                 @else
                                 <a  href="<?=URL::to('admin/get_payment',array($contract_detail->id))?>"  class="btn btn-info disabled">Receive Payment</a>

                                 @endif

                                    <a  href="<?=URL::to('admin/send_payment',array($contract_detail->id))?>"  class="btn btn-primary">Send Payment</a>
                                </td>


                                <td>
                                    <center>
                                    <a  href="<?=URL::to('admin/see_history',array($contract_detail->id))?>"  class="btn btn-primary">Status</a>
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

