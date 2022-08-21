<!doctype html>
<html class="no-js" lang="hu-HU">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Szintfelmérő</title>
    <link rel="stylesheet" href="/css/foundation.min.css">
    <link rel="stylesheet" href="/css/alap.css">
    <script src="https://kit.fontawesome.com/44076e1688.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

    <div class="off-canvas-wrapper">

        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

            <div class="off-canvas position-left reveal-for-large" id="menu" data-off-canvas data-position="left">
                <div class="row column">
                    <h4>Online Banking</h4>
                    <ul class="vertical menu">
                        @guest
                        <li><a href="/" data-hover="Kezdőlap">Kezdőlap</a></li>

                        @if (Route::has('login'))
                        <li><a href="/login" data-hover="Bejelentkezés">Bejelentkezés</a></li>
                        @endif

                        @if (Route::has('register'))
                        <li><a href="/register" data-hover="Regisztráció">Regisztráció</a></li>
                        @endif

                        @else

                        @if (Route::has('login'))
                        <li><a href="/dashboard" data-hover="Kezdőlap">Kezdőlap</a></li>

                        @endif
                        <li><a href="/myAccount" data-hover="Számláim">Számláim</a></li>
                        @if(Auth::user()->isAdmin())
                        <li><a href="/deposit" data-hover="Pénz befizetése">Pénz befizetése saját számlára</a></li>
                        <li><a href="/withdraw" data-hover="Pénz kifizetése">Pénz kifizetése saját számláról</a></li>
                        <li><a href="/transactions" data-hover="Tranzakciók">Tranzakciók</a></li>
                        @endif
                        <li><a href="/logout" data-hover="Kijelentkezés">Kijelentkezés</a></li>
                        @endguest
                    </ul>
                </div>
            </div>

            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/js/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>