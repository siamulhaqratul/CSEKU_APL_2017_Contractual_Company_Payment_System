@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        
            <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h1> User </h1><hr>
            <div class="panel panel-default" >
                
                <div class="panel-body">                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align:center">Name</th>   
                                <th style="text-align:center">Phone Number</th> 
                                <th style="text-align:center">Role Name</th> 
                                <th style="text-align:center">Active</th> 
     
                                <th style="text-align:center">Action</th>
                                <th style="text-align:center">Economical Status</th>
                            </tr>
                        </thead>
                        <tbody>       
                            @foreach($users as $user)
                                @if($user->rolename!='Admin' && $user->approve == 1)                          
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->contact_no}}</td>
                                        <td>{{$user->rolename}}</td>
                                        
                                            <td>Approved</td>
                                        <td style="text-align:center"> 

                                             <a  onclick="return check()" href="<?=URL::to('admin/home/user_disable',array($user->id))?>" class="btn btn-warning">
                                            
                                                <span class="glyphicon glyphicon-trash"></span>Disable</a>
                                            
                
                                            <a  onclick="return check()" href="<?=URL::to('admin/home/user_delete',array($user->id))?>" class="btn btn-danger">
                                            
                                                <span class="glyphicon glyphicon-trash"></span>Detete</a>
                                            </td>

                                            <td style="text-align: center">
                                                
                                                @if($user->rolename == "Staff")
                                                <a href="<?=URL::to('admin/stuff',array($user->id))?>" class="btn btn-primary">
                                            
                                                Status</a>
                                                @else
                                                <a  href="<?=URL::to('admin/client',array($user->id))?>" class="btn btn-primary">Status</a>
                                                @endif

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
