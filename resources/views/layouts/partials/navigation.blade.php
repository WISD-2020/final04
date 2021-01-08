<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart') }}">購物車</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order') }}">我的訂單</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}">{{ Auth::user()->name }} 您好！</a>
                        @else
                            <a href="{{ route('login') }}">登入</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">註冊</a>
                            @endif
                        @endauth

                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
