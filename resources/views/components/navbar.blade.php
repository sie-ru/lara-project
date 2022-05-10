<header class="header clearfix element_to_stick">
    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
    <div class="container">
        <x-logo />
        <ul class="top_menu">
            @guest()
                <li><a href="{{ route('auth_login') }}" class="btn_access">Log In</a></li>
            @endguest
            @auth()
                <li><a href="{{ route('post_create') }}" class="btn_create_new ">Create new</a></li>
                <li><a href="{{ route('user_profile', auth('web')->user()->id) }}" class="btn_access">{{'@' . auth('web')->user()->name }}</a></li>
            @endauth
        </ul>
        <a href="#0" class="open_close">
            <i class="bi bi-list"></i><span>Menu</span>
        </a>
        <nav class="main-menu">
            <div id="header_menu">
                <a href="#0" class="open_close">
                    <i class="bi bi-x"></i>
                </a>
                <x-logo />
            </div>
            <ul>
                <li class="menu">
                    <a href="{{ route('feed') }}">Feed</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
