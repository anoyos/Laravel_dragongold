{{-- For submenu --}}
<ul class="menu-content">
    @foreach($menu as $submenu)
        <li class="{{ (request()->is($submenu->url)) ? 'active' : '' }}">
            <a href="{{ url($submenu->url) }}">
                <i class="{{ isset($submenu->icon) ? $submenu->icon : "" }}"></i>
                <span class="menu-title" data-i18n="">{{ $submenu->name }}</span>
            </a>
            @if (isset($submenu->submenu))
                @include('admin.panels.submenu', ['menu' => $submenu->submenu])
            @endif
        </li>
    @endforeach
</ul>