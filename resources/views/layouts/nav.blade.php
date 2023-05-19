<nav class="navbar navbar-expand-lg fixed-top bg-danger ">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('frontend.home') }}" rel="tooltip" title="Coded by Creative Tim"
                data-placement="bottom">
                Coding Website
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton"
                            href="#pk" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu dropdown-info" aria-labelledby="dropdownMenuButton">

                            @foreach ($categories as $category)
                                <a class="dropdown-item"
                                    href="{{ route('front.categories', $category->id) }}">{{ $category->name }}</a>
                            @endforeach

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton"
                            href="#pk" role="button" aria-haspopup="true" aria-expanded="false"> Skills</a>
                        <ul class="dropdown-menu dropdown-info" aria-labelledby="dropdownMenuButton">

                            @foreach ($skills as $skill)
                                <a class="dropdown-item"
                                    href="{{ route('front.skills', $skill->id) }}">{{ $skill->name }}</a>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton"
                            href="#pk" role="button" aria-haspopup="true" aria-expanded="false"> Tags</a>
                        <ul class="dropdown-menu dropdown-info" aria-labelledby="dropdownMenuButton">

                            @foreach ($tags as $tag)
                                <a class="dropdown-item"
                                    href="{{ route('front.tags', $tag->id) }}">{{ $tag->name }}</a>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" data-placement="bottom" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" data-placement="bottom" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton"
                                href="#pk" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}</a>
                            <ul class="dropdown-menu dropdown-info" aria-labelledby="dropdownMenuButton">
                                @if (auth()->user()->group == 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('front.profile', auth()->user()->id) }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </li>
                @endauth
                <li>
                    <form class="form-inline ml-auto" style="margin-top: 15px" action="{{ route('frontend.home') }}">
                        <div class="form-group has-white">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>
