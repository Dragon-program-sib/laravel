@extends('layouts.admin')
@section('content')
@section('title') Список новостей - @parent @stop
<div class="col-md-8">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список новостей</h1>
        <a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Добавить новость</a>
    </div>
    <div class="row">
        <div class="col-md-12">
        @include('inc.messages')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>#ID</th>
                        <th>Категория</th>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Дата добавления</th>
                        <th>Управление</th>
                    </thead>
                    <tbody>
                    @forelse($newsList as $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td>{{ optional($news->category)->title }}</td>
                                <td>{{ $news->title }}</td>
                                <td>{!! $news->description !!}</td>
                                <td>{{ $news->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Редактировать</a>
                                    &nbsp;
                                    <a href="">Удалить</a>
                                </td>
                            </tr>
                    @empty
                        <h3>Новости отсутствуют!</h3>   
                    @endforelse
                    </tbody>
                </table>
                {!! $newsList->links() !!}
            </div>
        </div>
    </div>
</div>
{{-- Комментарий. --}}
@endsection
