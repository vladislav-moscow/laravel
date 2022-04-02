@extends ('layouts.main')
@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">получение данных</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>

    </div>
@endsection
@section('content')

    <div class="row">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('parser.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" >
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="description">описание</label>
                <textarea type="text" class="form-control" name="description" id="description" {!! old('description') !!}> </textarea>
            </div>
            <br><br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection
