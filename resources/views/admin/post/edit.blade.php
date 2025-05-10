@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование</h1>
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
                        <h6>Добавление поста</h6>
                        <form class="w-50" method="post" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input class="form-control" value="{{ $post->title }}" type="text" placeholder="Название категории" name="title">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">
                                    {{ $post->content }}
                                </textarea>
                            </div>
                            @error('content')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="w-25">
                                    <img class="w-50" src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input  type="file" class="custom-file-input" name="preview_image" >
                                        <label class="custom-file-label">Выбрать файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputFile">Добавить главное изображение</label>
                                <div class="w-25">
                                    <img class="w-50" src="{{ asset('storage/' . $post->main_image) }}" alt="main_image">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input  type="file" class="custom-file-input" name="main_image" >
                                        <label class="custom-file-label">Выбрать файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Выбрать категорию</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $post->category_id ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Теги</label>
                                <div class="select2-purple">
                                    <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Выбрать теги" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option
                                                {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $tag->id }}" >{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('tag_ids')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group mt-2">
                                <input type="submit" value="Добавить" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
