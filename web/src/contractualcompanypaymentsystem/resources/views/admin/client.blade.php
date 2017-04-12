  <?php 
      use App\Contract_detail;
?>

@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
 <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1>Client Payment History</h1><hr>
            <div class="panel panel-default" >
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>Contract ID</center></th> 
                                <th><center>Duty Date</center></th> 
                                <th><center>Amount</center></th>
                            </tr>
                        </thead>
                        <tbody>       
                            @foreach($clinent_payments as $clinent_payment)
                            <tr>
                                @if($clinent_payment->approved_by_manager == 1)
                                <?php 
                                $flag = 0;
                                $contractid = $clinent_payment->contract_id;

                                $contract = Contract_detail::find($contractid);

                                if($id == $contract->client_id){
                                    $flag=1;
                                }

                                 ?>

                                @if($flag == 1)

                                <td><center>{{$clinent_payment->contract_id}}</center></td>
                                <td><center>{{$clinent_payment->date}}</center></td>
                                 <td><center>{{$clinent_payment->amount_paid}}</center></td>

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
