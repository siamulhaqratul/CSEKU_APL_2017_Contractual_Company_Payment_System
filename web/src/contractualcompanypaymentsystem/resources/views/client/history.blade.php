@extends('client.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> Payment History</h1><hr>
            <div class="panel panel-default" >

               <!--  <div class="panel-heading">User Listing</div> -->
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th style="text-align:center">Amount</th> 
                                <th style="text-align:center">Date</th>
                                <th style="text-align:center">Status</th>

                                
                            </tr>
                        </thead>
                        <tbody>       
                        @foreach($clinent_payments as $clinent_payment)
                            <tr>
                               @if($clinent_payment->contract_id == $id)
                                <td><center>{{$clinent_payment->amount_paid}}</center></td>
                                <td><center>{{$clinent_payment->date}}</center></td>
                                <td><center>

                                    @if($clinent_payment->approved_by_manager == 1)
                                    Paid
                                    @else
                                    Pending
                                    @endif


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
