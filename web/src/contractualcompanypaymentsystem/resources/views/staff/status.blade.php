<?php 

use App\Contract_detail;
use App\StuffDuty;

 ?>


@extends('staff.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1>Active Contract</h1><hr>
            <div class="panel panel-default" >

               <!--  <div class="panel-heading">User Listing</div> -->
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>

 
                                <th style="text-align:center">Duty Date</th>
                                
                                <th style="text-align: center"> Status </th>
                            </tr>
                        </thead>
                        <tbody> 

                        @foreach($stuffduties as $duty )
                        <tr>


                        @if($duty->contract_id == $id)
                        <td><center>
                            {{$duty->duty_date}}
                        </center>                           
                        </td>
                        
                        <td>
                            <CENTER>
                            @if($duty->payment_appove_by_staff == 0)
                                Unpaid
                            @else
                                Paid
                            @endif
                            </CENTER>
                        </td> 
                          
                        </tr>
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