</div>
<div class="sidebar">
    @include('users._partials.nav')

    <div class="box-news">
        <div class="box-news_title">
            <p>{{ __('Latest news') }}</p>
        </div>
        <ul class="list">
            @foreach($news as $new)
            <li class="list_item">
                <p>{{ $new->created_at->format('M j, Y H:ia') }}</p>
                <a href="{{ route('news.show', $new->slug) }}">{{ $new->title }}</a>
            </li>
            @endforeach
        </ul>
        <div class="box-btn">
            <a href="{{ route('news.index') }}" class="btn-effect">{{ __('All platform news') }} <span></span></a>
        </div>
    </div>                
</div>
</div>
</div>
</section>