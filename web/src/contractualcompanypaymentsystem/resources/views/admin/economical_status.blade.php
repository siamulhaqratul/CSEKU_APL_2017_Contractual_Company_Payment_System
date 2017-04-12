@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> Total Economical Status </h1><hr>
            <div class="panel panel-default" >
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>Contract ID</center></th> 
                                <th style="text-align:center"> Get Payment</th>
                                <th style="text-align:center"> Send Payment</th>
                                <th style="text-align:center"> Profit</th>
                            </tr>
                        </thead>
                          
                        <tbody> 
                        <?php  
                        $total = 0;
                        ?>      
                           @foreach($contract_details as $contract_detail)
                            <tr>
                                 @if($contract_detail->Active==1 && $contract_detail->staff_id != null && $contract_detail->client_id != null) 
                                <td><center>{{$contract_detail->id}}</center></td>

                                 <td style="text-align:center">

                                 <?php  
                                 $staffPayment = 0;
                                 $clientPayment = 0;


                                 $staffPaymentPerDay = ($contract_detail->payment_for_staff_monthly)/($contract_detail->monthly_workingday);
                                 ?>


                                @foreach($clinent_payments as $clinent_payment)


                                
                               @if(($contract_detail->id == $clinent_payment->contract_id) 
                               &&  ($clinent_payment->approved_by_manager == 1))

                               <?php 
                                $clientPayment += $clinent_payment->amount_paid;

                               ?>
                               
                                   
                                @endif
                                @endforeach

                                  {{$clientPayment}}
                                </td>

                                <td>

                                @foreach($stuff_dutys as $stuff_duty)


                                
                               @if(($contract_detail->id == $stuff_duty->contract_id) 
                               &&  ($stuff_duty->paid == 1))

                               <?php 
                                $staffPayment += $staffPaymentPerDay;

                               ?>
                               
                                   
                                @endif
                                @endforeach


                                    <center>

                                    <?php 
                                    $staffPayment = ceil($staffPayment);
                                    echo (ceil($staffPayment));

                                    ?>

                                    


                                    </center>
                                </td> 

                                <td style="text-align:center" >
                                    
                                    <?php 
                                    echo ($clientPayment-$staffPayment);

                                    $total += ($clientPayment-$staffPayment);
                                     ?>
                                </td>
                                    @endif

                                    
                                @endforeach 

                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                              
                              <td style="text-align:center">Total Profit</td>
                              <td style="text-align:center">{{$total}}</td>
                            </tr>
                          </tfoot

                        </table>
                    
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

