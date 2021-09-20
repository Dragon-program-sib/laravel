@extends('layouts.admin')
@section('content')
@section('title') Список новостей - @parent @stop
<div class="col-md-8">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список новостей</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Добавить новость</a>
        </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Управление</th>
            </thead>
            @forelse($newsList as $news)
                <tbody>
                    <tr>
                        <td>{{ $news['id'] }}</td>
                        <td>{{ $news['title'] }}</td>
                        <td>{!! $news['description'] !!}</td>
                        <td>{{ now()->format('d-n-Y H:i') }}</td>
                        <td>
                            <a href="">Редактировать</a>
                            &nbsp;
                            <a href="">Удалить</a>
                        </td>
                    </tr>
                </tbody>
            @empty
                <h3>Новости отсутствуют!</h3>   
            @endforelse
        </table>
    </div>
</div>
{{-- Комментарий. --}}
@endsection
