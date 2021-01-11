<?php
use App\Http\Controllers\CartsController;
use App\Models\Cart;

?>
<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('shop')}}">final04</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('shop')}}">商品區</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}">購物車</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('order')}}">我的訂單</a>
                </li>

                <li class="nav-item">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false" href="">{{Auth::user()->name}}</a>
                            <ul class="dropdown-menu">
                                <!-- Account Management -->
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                                </li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                </form>
                            </ul>
                        </li>

                    @else
                        <a class="nav-link" href="{{ route('login') }}">登入</a>
                        </li>

                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">註冊</a>
                            @endif
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
