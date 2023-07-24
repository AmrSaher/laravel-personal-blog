<header class="header">
    <h1 class="brand">Blog</h1>
    <nav class="links">
        <ul>
            <li>
                <a href="{{ route('posts.index') }}" class="{{ Route::is('posts.index') ? 'active' : '' }}">Home</a>
            </li>
            <li>
                <a href="{{ route('about-me') }}" class="{{ Route::is('about-me') ? 'active' : '' }}">About Me</a>
            </li>
            @auth
                <li>
                    <a href="{{ route('posts.create') }}" class="{{ Route::is('posts.create') ? 'active' : '' }}">Add Post</a>
                </li>
                <li>
                    <a href="{{ route('categories.create') }}" class="{{ Route::is('categories.create') ? 'active' : '' }}">Add Category</a>
                </li>
                <li>
                    <form style="display: none" action="{{ route('logout') }}" method="post" id="logout-form">@csrf</form>
                    <a href="#" class="login" onclick="if (confirm('Are you sure?')) document.getElementById('logout-form').submit()">Logout</a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="login">Login</a>
                </li>
            @endauth
        </ul>
    </nav>
</header>
