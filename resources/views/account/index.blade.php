@extends ('layouts.main')
@section('content')
    <div>
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br>
        @if(\Auth::user()->is_admin)
            <a href=" {{ route('admin.index') }} ">В админку!</a>
        @endif
            <a href=" {{ route('category') }} ">На сайт!</a>
    </div>


@endsection
