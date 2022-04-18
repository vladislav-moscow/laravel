@extends ('layouts.admin')
@section('title') Редактировать новость @parent  @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>

    </div>
    <div class="row">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.news.update', ['news'=> $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value=" {{ $category->id }}"
                                @if($category->id === $news->category_id) selected @endif> {{ $category->title }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Название новости</label>
                <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title" value="{{ $news->title }}">
                @error('title') <strong style="color: red;"> {{ $message }} </strong> @enderror
            </div>
            <div class="form-group">
                <label for="author">автор</label>
                <input type="text" class="form-control @if($errors->has('author')) alert-danger @endif" name="author" id="author" value="{{$news->author }}">
                @error('author') <strong style="color: red;"> {{ $message }} </strong> @enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="status">статус</label>

                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">описание новости</label>
                <textarea type="text" class="form-control @if($errors->has('description')) alert-danger @endif" name="description" id="description"> {!! $news->description !!} </textarea>
                @error('description') <strong style="color: red;"> {{ $messages }} </strong> @enderror
            </div>
            <br><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>

@endsection
