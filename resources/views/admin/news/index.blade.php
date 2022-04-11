@extends ('layouts.admin')
@section('title') Список новостей @parent  @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Название категории</th>
                <th>Заголовок</th>
                <th>Автор</th>
                <th>Статус</th>
                <th>Описание</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $news)
                <tr>
                    <td> {{ $news->id }} </td>
                    <td> {{ $news->categoryTitle }} </td>
                    <td> {{ $news->title }} </td>
                    <td> {{ $news->author }} </td>
                    <td> {{ $news->status }} </td>
                    <td> {{ $news->description }} </td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">РЕД.</a>
                        &nbsp;
                        <a href="javascript:;" style="color:red">УДЛ.</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Записей нету!</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
