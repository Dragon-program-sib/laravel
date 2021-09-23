@extends('layouts.admin')
@section('title') Редактировать категорию - @parent @stop

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать категорию</h1>
    </div>
    <br>
        <div class="col-md-12">
            @include('inc.messages')
            <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" type="text" class="form-control" name="description" id="description">
                        {!! $category->description !!}
                    </textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
@endsection