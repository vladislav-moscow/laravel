<header>
    <div class="collapse bg-dark" id="navbarHeader">


    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href=" {{ route('category') }} " class="navbar-brand d-flex align-items-center">
                <strong>Сайт новостей</strong>
            </a>
            <div class="btn-group me-2">
                <a href=" {{ route('parser.index') }}" class="btn btn-sm btn-outline-secondary">Запросить данные</a>
            </div>
            <div class="btn-group me-2">
                <a href=" {{ route('feedback.index') }}" class="btn btn-sm btn-outline-secondary">Отзывы</a>
            </div>
            <div class="btn-group me-2">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">{{ __('Вход') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle btn btn-sm btn-outline-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>

        </div>


    </div>
</header>
