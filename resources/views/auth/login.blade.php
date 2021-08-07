@extends('layouts.app')

@section('content')
<div class="container login">
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{ url('/auth/redirect/discord') }}" class="btn login-btn"><i class="fa fa-discord"></i>Login with Discord</a>
        </div>
    </div>
</div>
@endsection