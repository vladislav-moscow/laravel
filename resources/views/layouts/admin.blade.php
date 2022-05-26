<!doctype html>
<html lang="ru">
    <x-admin.head></x-admin.head>
<body>
    <x-admin.header></x-admin.header>
    <div class="container-fluid">
        <div class="row">
            <x-admin.sidebar></x-admin.sidebar>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
</body>
</html>
