@extends ('layouts.main')
@section('content')
    <div>
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br>
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">В админку!</a>
        @else
            <a href="{{ route('category') }}">На сайт!</a>
        @endif
        @if (Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}" style="width: 250px;" alt="{{ Auth::user()->name }}">
        @endif
    </div>


@endsection
