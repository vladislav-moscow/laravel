@extends ('layouts.admin')
@section('title') Список пользователей @parent  @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>email</th>
                <th>Статус</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($usersList as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->is_admin ? 'админ' : 'пользователь' }} </td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Ред.</a>
                        &nbsp;
                        <a href="javascript:;" class="delete" id="{{ $user->id }}" style="color:red;">Удл.</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Пользователей нет</td></tr>
            @endforelse
            </tbody>
        </table>

        {{ $usersList->links() }}
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
                        send(`/admin/users/${id}`).then(() => {
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
