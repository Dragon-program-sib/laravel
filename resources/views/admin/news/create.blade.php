@extends('layouts.admin')
@section('title') Добавить новость - @parent @stop

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавить новость</h1>
    </div>
    <br>
        <div class="col-md-12">
            @include('inc.messages')
            <form action="{{ route('admin.news.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if (old('category_id') === $category->id) selected
                                @endif
                                >{{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="author">Автор</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" type="text" class="form-control" name="description" id="description">
                        {!! old('description') !!}
                    </textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </div>
@endsection

