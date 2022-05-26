@extends ('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список новостей</h1>
        </div>
    </div>
@endsection
@section('content')
@forelse ($newsList as $news)
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{ Storage::disk('public')->url($news->image) }}" alt="photo">

            <div class="card-body">
                <strong>{{ $news->title }}</strong>
                <p>{{ $news->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">

                        <a href=" {{ route('news.show', ['news' => $news]) }} " class="btn btn-sm btn-outline-secondary"> Подробнее</a>
                    </div>
                    <small class="text-muted">Автор: <em>{{ $news->author }}</em></small>
                    <small class="text-muted">Статус:<em>{{ $news->status }}</em></small>
                </div>
            </div>
        </div>
        {{ $news->links() }}
    </div>

@empty
    <h2>Статей нет</h2>
 @endforelse

@endsection

