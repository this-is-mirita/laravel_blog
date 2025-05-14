@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3">{{ $user->name }}</h1>
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="text-success mr-2" title="Редактировать">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.user.delete', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm bg-transparent text-danger p-0" title="Удалить"
                                    onclick="return confirm('Удалить пользователя?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-6 text-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.main.index') }}">Главная</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.user.index') }}">Пользователи</a>
                            </li>
                            <li class="breadcrumb-item active">Профиль пользователя {{$user->name}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Информация о пользователе</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered table-hover mb-0">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Имя</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата создания</th>
                                        <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Последнее обновление</th>
                                        <td>{{ $user->updated_at->format('d.m.Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Роль</th>
                                        <td>{{ $user->role ? 'User' : 'Admin' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
