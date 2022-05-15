<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbar">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3 {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a class="nav-link text-white" href="#">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item mx-3 dropdown {{ strpos(Route::currentRouteName(), 'property.') !== false ? 'active' : '' }}">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="dropdown" data-mdb-toggle="dropdown" aria-expanded="false">
                            {{ __('Properties') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="#dropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('property.index') }}">
                                    <i class="fa-solid fa-list"></i>&nbsp;
                                    {{ __('List of properties') }}
                                </a>
                            </li>
                            @auth
                                <li>
                                    <a class="dropdown-item" href="{{ route('property.create') }}">
                                        <i class="fa-solid fa-plus"></i>&nbsp;
                                        {{ __('Add a property') }}
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="btn-group dropstart mx-1 ml-auto">
                <button class="btn btn-sm btn-outline-primary bg-white dropdown-toggle" type="button" id="langDropdown" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-language fa-xl"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="langDropdown">
                    @foreach (App\Enums\LangsEnum::toValues() as $lang)
                        <li><a class="dropdown-item" href="{{ route('lang.update', ['lang' => $lang]) }}">{{ $lang }}</a></li>
                    @endforeach
                </ul>
            </div>
            @auth
                <div class="btn-group dropstart mx-1">
                    <button class="btn btn-sm btn-outline-primary bg-white dropdown-toggle" type="button" id="accountDropdown" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-gear fa-xl"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="#">{{ __('My account') }}</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li class="pb-2 text-center">
                            <form id="logout-form" class="mx-auto" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-power-off"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                @if(Route::currentRouteName() == 'login')
                    <a class="btn btn-primary ml-auto" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @else
                    <a class="btn btn-primary ml-auto" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                @endif
            @endauth
        </div>
    </nav>
    <!-- Navbar -->
</header>
