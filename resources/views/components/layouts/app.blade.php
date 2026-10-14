<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Articoli' }}</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('articles.index') ? 'active' : '' }}"
                        href="{{ route('articles.index') }}">Tutti gli articoli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('articles.create') ? 'active' : '' }}"
                        href="{{ route('articles.create') }}">Nuovo articolo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ciao, {{ Auth::check() ? Auth::user()->name : 'Ospite' }}!
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                            @if (Route::has('logout'))
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            @endif
                        @else
                            @if (Route::has('login'))
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            @endif
                            @if (Route::has('register'))
                                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    {{ $slot }}
</body>

</html>