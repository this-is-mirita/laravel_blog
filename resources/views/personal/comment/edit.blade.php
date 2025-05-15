@extends('personal.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Главная</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h6>Добавление категории</h6>
                        <form class="w-25" method="post" action="{{ route('personal.comment.update', $comment->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <textarea name="message">{{ $comment->message }}</textarea>
                                @error('message')
                                <div class="text-danger">
                                    Поле должно быть заполнено <br>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <input type="submit" value="Обновить" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
