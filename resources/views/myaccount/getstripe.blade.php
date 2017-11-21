@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Stripe Info</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('myaccount_stripe_update') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_stripe_api_key') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">API Key</label>

                            <div class="col-md-6">
                                <input id="user_stripe_api_key" type="text" class="form-control" name="user_stripe_api_key" value="{{ old('user_stripe_api_key', $user->user_stripe_api_key) }}" required autofocus>

                                @if ($errors->has('user_stripe_api_key'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_stripe_api_key') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_stripe_api_secret') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Secret</label>

                            <div class="col-md-6">
                                <input id="email" type="text"  class="form-control" name="user_stripe_api_secret" value="{{ old('user_stripe_api_secret', $user->user_stripe_api_secret) }}" required>

                                @if ($errors->has('user_stripe_api_secret'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_stripe_api_secret') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
