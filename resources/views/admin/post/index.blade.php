@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                        <a href="{{ route('admin.post.create') }}" class=" btn btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr class="text-center">
                                        <th>id</th>
                                        <th>Название</th>
                                        <th>Контент</th>
                                        <th colspan="3">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr class="text-center">
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{!! $post->content !!}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.post.show', $post->id) }}">
                                                    <i class="nav-icon far fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="text-success" href="{{ route('admin.post.edit', $post->id) }}">
                                                    <i class="nav-icon fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form method="POST"
                                                      action="{{ route('admin.post.delete', $post->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="nav-icon fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
