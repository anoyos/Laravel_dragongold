@extends('users.layouts.master')

@section('title', __('Webinars'))

@section('content')
<div class="webinars_top-screen">
	<div class="main-container">
		<div class="webinars_top-screen_box-text">
			<p>{{ __('Share your knowledge') }}</p>
			<h2>{!! __('Want to become :break :appname Speaker?', ['break' => '<br>', 'appname' => config('app.name')]) !!}</h2>
		</div>
		<div class="webinars_top-screen_box-counter">
			<div class="box-btn">
				<p>{{ __('Fill out the form of the speaker') }}</p>
				<a href="#" target="_blank" class="btn-effect btn">{{ __('Become a speaker') }} <span></span></a>
			</div>
			<div class="box-timer">
				<div class="box-timer_title">
					<p>{!! __("Don't miss the :break next webinar", ['break' => '<br>']) !!}</p>
				</div>
				
				<div class="timer">
					<p>{{ __('The next webinar will be very soon!') }}</p>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="webinars_section-list">
	<div class="main-container">
		<div class="webinars_section-list_content">
			
			<div class="tab-content">
				<div class="tab-item">
					<div class="item-row active-item-row">
						<div class="box-media">
							<img src="{{ asset('splash_assets//images/external/webinars/web-photo.png') }}" alt="img">
						</div>
						<div class="box-text">
							
							<div class="box-text_title">
								<p>{{ __('Be the first to host a webinar!') }}</p>
							</div>
							<div class="box-text_wrap-text">
								<p>
									{{ __('Dear investors, a webinar center has been launched on our platform, where anyone can apply for a host webinar! If you have something to tell other users, make a presentation of our platform and just find new partners - fill out') }} <a href="#" target="_blank" class="link-effect">{{ __('this application') }}</a>.                                    </p>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>


	@endsection