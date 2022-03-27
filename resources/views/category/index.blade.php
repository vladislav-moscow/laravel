@extends ('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список категорий</h1>
        </div>
    </div>
@endsection
@section('content')
@forelse ($categoryArray as $category)
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{ $category['image'] }}" alt="photo">
            <div class="card-body">
                <strong><a href="{{ route('categoryNews', ['category_id' => $category["id"]]) }}">{{ $category['title'] }}</a></strong>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">

                        <a href=" {{ route('categoryNews', ['category_id' => $category["id"]]) }} " class="btn btn-sm btn-outline-secondary"> Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <h2>категорий еще нет!</h2>
@endforelse
@endsection
