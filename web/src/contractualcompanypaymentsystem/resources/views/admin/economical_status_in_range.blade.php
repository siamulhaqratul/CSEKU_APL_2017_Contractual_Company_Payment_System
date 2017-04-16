@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> Total Economical Status {{$startDate1}} To {{ $endDate1}}</h1><hr>


            <div class="panel panel-default" >

             <div class="panel-heading">
              <form class="form-inline"  role="form" method="POST" action="{{URL::to('admin/economical/story')}}">
                  {{ csrf_field() }}
            
              <div class="col-md-5">
                 <label for="Date">Start Date:</label>
                 <input type="Date" class="form-control" id="start_date" name="start_date" placeholder="dd/mm/YYYY" required autofocus>
               </div>
                   <div class="col-md-6">    
                  <label for="Date">End Date</label>
                  <input type="Date" class="form-control" id="end_date" name="end_date" placeholder="dd/mm/YYYY" required autofocus>
         
                </div>
              
              <button type="submit" class="btn btn-default">Filter</button>
                </form>



             </div>
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
                        $flag1 = 0;
                        $flag2 = 0;
                        ?>  

                        <?php 

                                  $startDate1 = str_replace('/', '-', $startDate1);

                                  //echo $startDate1;

                                  $startDate1 = strtotime($startDate1);

          
                                  $endDate1 = str_replace('/', '-', $endDate1);

                                  //echo $endDate1;

                                  $endDate1 = strtotime($endDate1);

                                 
                               

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


                               
                                <?php 

                                foreach ($clinent_payments as $clinent_payment) {
                                  # code...
                                
                                  $flag1=0;
                                  $date = $clinent_payment->date;

                                  $date = strtotime($date);

                                  if($startDate1<= $date && $date <= $endDate1){

                                    $flag1 = 1;

                                  }

                                  if(($contract_detail->id == $clinent_payment->contract_id) 
                               &&  ($clinent_payment->approved_by_manager == 1) && ($flag1 == 1)){

                               
                                $clientPayment += $clinent_payment->amount_paid;


                               

                                }}
                                ?>
                                                     
                                   
                               

                                  {{$clientPayment}}
                                </td>

                                <td>

                                @foreach($stuff_dutys as $stuff_duty)


                                <?php 
                                $flag2 = 0;

                                  $date3 = $stuff_duty->duty_date;

                                  $date3 = strtotime($date3);


                                  if($startDate1<=$date3 && $endDate1>= $date3){

                                    $flag2 = 1;

                                  }
                                 ?>
                                
                               @if(($contract_detail->id == $stuff_duty->contract_id) 
                               &&  ($stuff_duty->paid == 1) && ($flag2 == 1))

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

