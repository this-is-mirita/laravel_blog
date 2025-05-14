@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="m-0">Пользователи</h1>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Добавить пользователя</a>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.main.index') }}">Главная</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Пользователи
                        </li>
                    </ol>
                </nav>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Список пользователей</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered text-center mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th colspan="3">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.show', $user->id) }}" title="Просмотреть">
                                            <i class="fas fa-eye text-info"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $user->id) }}" title="Редактировать">
                                            <i class="fas fa-edit text-success"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.user.delete', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" title="Удалить" onclick="return confirm('Удалить пользователя?')">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Пользователи не найдены</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
