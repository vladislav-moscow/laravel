<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-header></x-header>
<main>
    <section class="py-5 text-center container">
        @yield('header')
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @yield('content')
            </div>
        </div>
    </div>
</main>
<x-footer></x-footer>
</body>
</html>
