@extends('client.layouts.app')

@section('content')
<div class="container">
    <div class="column">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Make Contract</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{URL::to('client/make_contract/store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Day Per Month</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="monthly_workingday" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">Starting Date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="text" class="form-control" name="start_date" value="{{ old('start_date') }}" required>


                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Payment</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control" name="payment_from_client_monthly" value="{{ old('phonenumber') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Month Limit</label>

                            <div class="col-md-6">
                                <input id="email"  class="form-control" name="month_limit" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Make
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
