@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Редактирование</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Обновление данных пользователя</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            <table class="table table-bordered w-50">
                                <tr>
                                    <th><label for="name">Имя</label></th>
                                    <td>
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{ $user->name }}" placeholder="Введите имя">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="email">Email</label></th>
                                    <td>
                                        <input type="text" name="email" id="email" class="form-control"
                                               value="{{ $user->email }}" placeholder="Введите email">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                            <div class="form-group">
                                <label>Роль</label>
                                <div class="select2-purple">
                                    <select name="role" class="select2" multiple="multiple" data-placeholder="Выбрать роли" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}"
                                                {{ $id === $user->role ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
