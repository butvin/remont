<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">

                <div class="brand-block">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="brand-text">{{ __('Сантехника, отопление, фильтра') }}</span>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('навигация') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('войти') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('регистр.') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>

                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="user-name-text">{{ Auth::user()->name }}</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        {{ __('выйти') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
