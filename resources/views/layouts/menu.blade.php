
<li class="nav-item">
    <a href="{{ route('games.index') }}"
       class="nav-link {{ Request::is('games*') ? 'active' : '' }}">
        <p>Games</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('posts.index') }}"
       class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
        <p>@lang('models/posts.plural')</p>
    </a>
</li>

