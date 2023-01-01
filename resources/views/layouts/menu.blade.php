<li class="nav-item">
    <a href="{{ route('articles.index') }}"
       class="nav-link {{ Request::is('articles*') ? 'active' : '' }}">
        <p>Articles</p>
    </a>
</li>








<li class="nav-item">
    <a href="{{ route('posts.index') }}"
       class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
        <p>Posts</p>
    </a>
</li>


