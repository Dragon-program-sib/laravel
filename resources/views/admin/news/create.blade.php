@extends('layouts.admin')
@section('title') Добавить новость - @parent @stop

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавить новость</h1>
    </div>
    <br>
        <div class="col-md-12">
            <form action="{{ route('admin.news.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок новости</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="title">Автор новости</label>
                    <input type="text" class="form-control" name="author" id="author">
                </div>
                <div class="form-group">
                    <label for="title">Описание новости</label>
                    <textarea class="form-control" type="text" class="form-control" name="description" id="description">
                    </textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </div>
@endsection

