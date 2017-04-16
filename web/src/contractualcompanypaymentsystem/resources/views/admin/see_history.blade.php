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

                                <th style="text-align:center">
                                Duty Date 


                                @if($data1 == "Sort Ascending")
                                 <a  onclick="return check()" href="<?=URL::to('admin/see_history/des/date',array($id))?>" class="btn btn-primary">Sort Descending</a>

                                 @else
                                <a  onclick="return check()" href="<?=URL::to('admin/see_history',array($id))?>" class="btn btn-primary">Sort Ascending</a>

                               

                                @endif

                                </th>
                                <th style="text-align:center">Status
                                 @if($data == "Sort Ascending")
                                <a  onclick="return check()" href="<?=URL::to('admin/see_history/asc/app',array($id))?>" class="btn btn-primary">Sort Ascending</a></center>
                                @else

                                <a  onclick="return check()" href="<?=URL::to('admin/see_history/dsc/app',array($id))?>" class="btn btn-primary">Sort Descending</a></th>

                                @endif
                            </tr>
                        </thead>
                        <tbody>       
                           @foreach($duty as $duty1)
                            <tr>

                            @if($duty1->contract_id == $id)

                            <td style="text-align:center">
                                
                                {{$duty1->duty_date}}
                            </td>


                            @if($duty1->approved_by_client == 1)

                            <td style="text-align:center">
                                
                                Approved
                            </td>
                            @else
                            <td style="text-align:center">
                                Pending
                            </td>
                            @endif

                            @endif
                           @endforeach
                            </tr>
                              
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

