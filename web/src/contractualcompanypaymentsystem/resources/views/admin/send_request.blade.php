@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="column">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Send Request</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{URL::to('admin/send_request/store')}}">
                        {{ csrf_field() }}

 
                         <input  type="hidden"  name="id" value="{{ $contract_detail->id }}" >
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Starting Date</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="start_date" value="{{ $contract_detail->start_date }}" required>

                              
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Staff</label>
                            <div class="col-md-6">
                                <select class="form-control" name="staff_id">
                                    @foreach($users as $user)
                                    @if($user->rolename == 'Staff' && $user->approve == 1)
                                        <option value = "{{$user->id}}"  > {{$user->name }} </option>
                                    @endif
                                    @endforeach
                                </select>  
                            </div>

                           
                        </div>
                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Payment</label>
                            <div class="col-md-6">
                                <input  class="form-control" name="payment_for_staff_monthly"  required>
                            </div>
                            
                        </div>

                       
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
