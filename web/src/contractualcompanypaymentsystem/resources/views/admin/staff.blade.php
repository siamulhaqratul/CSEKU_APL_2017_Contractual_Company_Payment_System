  <?php 
      use App\Contract_detail;
?>

@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
 <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1>Staff Payment History</h1><hr>
            <div class="panel panel-default" >
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>Contract ID</center></th> 
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

                                    $payment = ceil($payment);
                                }

                                 ?>

                                @if($flag == 1)

                                <td><center>{{$staff_duty->contract_id}}</center></td>
                                <td><center>{{$staff_duty->duty_date}}</center></td>
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
