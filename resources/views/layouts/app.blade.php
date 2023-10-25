<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Css -->
    @vite(['resources/sass/app.scss', 'resources/css/theme.css', 'resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')

    @livewireStyles
</head>

<body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">
    @if(Route::currentRouteName() !='user.show' )
    <nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
        <div class="container">
            <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="{{ url('/') }}">
                <svg style="margin-top: -8px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-share-fill" viewBox="0 0 16 16">
                    <path
                        d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                </svg> <span class="ms-md-1 mt-1 fw-bolder me-md-5">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{ url('/') }}" aria-label="Homepage">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    @auth
                    <a class="nav-link fs-5" target="_blank" href="{{ route('user.show', auth()->user()) }}" aria-label="My profile">
                        {{ __('My profile') }}
                    </a>
                    @endauth
                </li>
            </ul>
            <div class="d-flex gap-2">
                @guest
                @if (Route::has('login'))
                <a class="btn btn-outline-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
                @if (Route::has('register'))
                <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                <div class="dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.index') }}">
                            {{ __('Dashboard') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('user.edit') }}">
                            {{ __('Edit profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </nav>
    @endif
    <main @if(Route::currentRouteName() !=='user.show' ) class="mb-5" @endif>
        <div class="container">
            <div class="row d-flex justify-content-center py-vh-5 pb-0">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-5 fw-bold">@yield('page-title')</h1>
                            <p class="text-muted">@yield('page-description')</p>
                            <p class="mt-5" data-aos="fade-up">@yield('content')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    @if(Route::currentRouteName() !== 'user.show')
    <footer class="bg-black border-top border-dark">
        <div class="container text-center small py-vh-2">
            <div>Template by
                <a href="https://templatedeck.com" class="link-fancy link-fancy-light"
                    target="_blank">templatedeck.com</a>
                <div>Made with couple <i class="bi bi-cup-hot-fill mx-1" style="color: orange;"></i> of tea, by
                    <a href="https://github.com/daffyyyy" class="link-fancy link-fancy-light"
                        target="_blank">daffyyyy</a>
                </div>
            </div>
        </div>
    </footer>
    @endif
    @livewireScripts
    @vite(['resources/js/livewire-sortable.js'])
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // values from 0 to 3000, with step 50ms
        });
    </script>
    @yield('scripts')
    @if(Route::currentRouteName() !== 'user.show')
    <script>
        let scrollpos = window.scrollY
        const header = document.querySelector(".navbar")
        const header_height = header.offsetHeight

        const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
        const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

        window.addEventListener('scroll', function() {
            scrollpos = window.scrollY;

            if (scrollpos >= header_height) { add_class_on_scroll() }
            else { remove_class_on_scroll() }
        })
    </script>
    @endif
</body>

</html>
