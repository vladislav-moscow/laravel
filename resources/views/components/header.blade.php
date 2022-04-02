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
        </div>
    </div>
</header>
