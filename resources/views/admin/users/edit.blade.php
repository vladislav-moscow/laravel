@extends ('layouts.admin')
@section('title') Редактировать пользователя  @parent  @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>

    </div>

        <div class="row">
            @include('inc.messages')
            <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
                @csrf
                @method('put')
                <select name="is_admin" title="Статус">
                    <option value="1" @if($user->is_admin === true) selected @endif>Администратор</option>
                    <option value="0" @if($user->is_admin === true) selected @endif>Пользователь</option>
                </select>
                <button type="submit" class="btn-outline-primary">Обновить</button>
            </form>
        </div>






@endsection
