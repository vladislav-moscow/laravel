@extends ('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Подробнее о новости</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{  Storage::disk('public')->url($n->image) }}" alt="photo">

            <div class="card-body">
                <strong>{{ $news->title }}</strong>
                <p>{{ $news->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Автор: <em>{{ $news->author }}</em></small>
                    <small class="text-muted">Статус:<em>{{ $news->status }}</em></small>
                </div>
            </div>
        </div>
    </div>
@endsection
