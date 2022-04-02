@extends ('layouts.main')
@section('title') Наши отзывы @parent  @endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список отзывов</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="col">

            <h2>Отзывов пока нету!</h2>
        <div class="btn-group me-2">
            <a href=" {{ route('feedback.create') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
        </div>
    </div>
@endsection
