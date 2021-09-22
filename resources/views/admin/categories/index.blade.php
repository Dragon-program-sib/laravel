@extends('layouts.admin')
@section('title') Список категорий - @parent @stop
@section('content')

<div class="col-md-8">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список категорий</h1>
        <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Добавить категорию</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Дата добавления</th>
                <th>Управление</th>
            </thead>

            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                    <a href="">Ред.</a>
                    <a href="">Уд.</a>
                    </td>
                </tr>
            @empty
                <h3>Категории отсутствуют!</h3>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
{{-- Комментарий. --}}
@endsection