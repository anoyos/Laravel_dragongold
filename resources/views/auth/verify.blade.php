@extends('homepage.master')
@section('title', 'Verify Email')
@section('logo', 'logo-main logo-white')
@section('styles')
<style type="text/css">
	.alert{
		padding: 15px;
		margin-bottom: 20px;
		border: 1px solid transparent;
		border-radius: 4px;
	}

	.alert-success{
		color: #3c763d;
		background-color: #dff0d8;
		border-color: #d6e9c6;
	}
</style>
@endsection
@section('content')
<div class="wrap-sign-in">
	<div class="main-container">
		<div class="wrap-universal" style="margin: 0px auto">
			<div class="dim-title">
				<p>{{ __('Email Verification')}}</p>
			</div>
			<div class="wrapper-title" style="text-align: center;">
				<p>
				{{ __('Verify Your Email Address') }}                   </p>

				<div class="box-text">
				    <h3> 
				    	@if (session('resent'))
				    	    <div class="alert alert-success">
				    	        {{ __('A fresh verification link has been sent to your email address.') }}
				    	    </div>
				    	@endif

				    	{{ __('Before proceeding, please check your email for a verification link.') }} <br>
				    	{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
				     </h3>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('javascript')

@endsection
