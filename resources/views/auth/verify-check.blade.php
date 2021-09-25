@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify account') }}</div>

                <div class="card-body">
                    <p>Hi {{ $data -> name }} Please verify your account first.</p>
                    
                    @if( $data -> email_verified_at < time()) 
                    <p><a href="{{ route('user.verify.resend.link', $data -> id) }}">Resend verify link</a> for account confirmation</p> 
                    @else 
                    <p>Check your email for account confirmation </p>
                    @endif

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
