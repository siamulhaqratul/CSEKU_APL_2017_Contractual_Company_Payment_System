@extends('client.layouts.app')

@section('content')
<div class="container">
    <div class="column">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Payment</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{URL::to('client/dosend_many')}}">
                        {{ csrf_field() }}
                       <input id="name" type="hidden" class="form-control" name="contract_id" value="{{ $id }}" required autofocus>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Paymet Serial</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="payment_serial" value="{{ old('name') }}">


                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control" name="amount_paid" value="{{ old('phonenumber') }}" required autofocus>

                             
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="text" class="form-control" placeholder="dd/mm/YYYY" name="date" value="{{ old('start_date') }}" required>


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
