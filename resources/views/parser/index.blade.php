@extends ('layouts.main')
@section('title') Данные @parent  @endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список Данных</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="col">
        @if(session()->has('success'))
            <div class="card-body text-center">
                <h1 class="card-title">{{ session()->get('success') }}</h1>
            </div>
            <div class="btn-group me-2">
                <a href=" {{ route('parser.create') }}" class="btn btn-sm btn-outline-secondary">Запросить данные</a>
            </div>
        @else
            <div class="card-body text-center">
                <h1 class="card-title">Что-то пошло не так</h1>
            </div>
            <div class="btn-group me-2">
                <a href=" {{ route('parser.create') }}" class="btn btn-sm btn-outline-secondary">Запросить данные</a>
            </div>
        @endif

    </div>

@endsection
