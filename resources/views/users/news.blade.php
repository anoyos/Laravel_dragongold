@extends('users.layouts.master')

@section('title', __('Platform News'))

@section('content')

<div class="wrapper-news">
			@if(isset($new))
	           <div class="news">
	           	<div class="news_title">
	           		<p>{{ $new->created_at->format('M j, Y H:ia') }}</p>
	           		<h2>{{ $new->title }}</h2>
	           	</div>
	           	<div class="news_content">
	           		<img src="{{ asset('news').'/'.$new->image }}" alt="" width="100%"><br><br><p>{{ $new->body }}</p>
	           		</div>
	           	</div>
	        @else

	        	@foreach($all as $new)
	        		<div class="news">
	        			<div class="news_title">
	        				<p>{{ $new->created_at->format('M j, Y H:ia') }}</p>
	        				<h2>{{ $new->title }}</h2>
	        			</div>
	        			<div class="news_content">
	        				<img src="{{ asset('news').'/'.$new->image }}" alt="" width="100%"><br><br><p>{{ $new->body }}</p>
	        				</div>
	        			</div>
	        		@break
	        	@endforeach

	        @endif
		<div class="news-sidebar">

			<ul class="list">
				@foreach($all as $new)
				<li class="list_item">
					<p>{{ $new->created_at->format('M j, Y H:ia') }}</p>
					<a href="{{ route('news.show', $new->slug) }}"
						class="active">
						{{ $new->title }}
					</a>
				</li>
				@endforeach

			</ul>
		</div>
	</div>

	@endsection