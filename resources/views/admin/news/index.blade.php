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
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Название категории</th>
                <th>Заголовок</th>
                <th>Автор</th>
                <th>Статус</th>
                <th>Описание</th>
                <th>Дата редактирования</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td> {{ $news->id }} </td>
                    <td> {{ $news->category->title }} </td>
                    <td> {{ $news->title }} </td>
                    <td> {{ $news->author }} </td>
                    <td> {{ $news->status }} </td>
                    <td> {{ $news->description }} </td>
                    <td>@if($news->updated_at) {{ $news->updated_at->format('d-m-Y H:i') }} @endif </td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news' => $news]) }}">РЕД.</a>
                        &nbsp;
                        <a href="javascript:;" class="delete" rel=" {{ $news->id }} " style="color:red">УДЛ.</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Записей нету!</td></tr>
            @endforelse
            </tbody>
        </table>

        {{ $newsList->links() }}
    </div>
@endsection
@push('js')
    <script>
        'use strict';
        document.addEventListener("DOMContentLoaded", () => {
            const item = document.querySelectorAll(".delete");
            item.forEach(function (el, index) {
                el.addEventListener("click", function () {
                    const id = this.getAttribute("id");
                    if (confirm(`Подтвердите удаление новости с #ID ${id} ?`)) {
                        //send id on backend
                        send(`/admin/news/${id}`).then(() => {
                            alert("Новость была удалена");
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
