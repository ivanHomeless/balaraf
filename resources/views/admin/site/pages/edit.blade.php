@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Страницы</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('admin.site.pages.index')}}">Страницы</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

    <form method="POST" action="{{ route('admin.site.pages.update', $page->id) }}" class="row g-3">
        {{csrf_field()}}
        {{ method_field('PATCH')  }}
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    @include('admin.includes.result_massage')
                    <h6 class="mb-0 text-uppercase">{{$page->title}}</h6>
                    <hr>
                    <div class="col-12">
                        <label class="form-label">Заголовок</label>
                        <input name="title" value="{{ old('title', $page->title) }}" type="text" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">URL</label>
                        <input name="slug" value="{{ old('slug', $page->slug) }}" type="text" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Контент</label>
                        <textarea name="content" id class="form-control" rows="4" cols="4">
                            {{ old('content', $page->content) }}
                        </textarea>
                    </div>

                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">SEO</h5>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="seo_title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input value="{{ old('seo_title', $page->seo_title) }}" name="seo_title" type="text" class="form-control" id="seo_title" placeholder="title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="seo_description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input value="{{ old('seo_description', $page->seo_description) }}" name="seo_description" type="text" class="form-control" id="seo_description" placeholder="description">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="seo_keywords" class="col-sm-3 col-form-label">Keywords</label>
                            <div class="col-sm-9">
                                <input value="{{ old('seo_keywords', $page->seo_keywords) }}" name="seo_keywords" type="text" class="form-control" id="seo_keywords" placeholder="keywords">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <script>
        var editor=CKEDITOR.replace( 'content',{
            extraPlugins : 'filebrowser',
            filebrowserBrowseUrl:'browser.php?type=Images',
            filebrowserUploadMethod:"form",
            filebrowserUploadUrl:"/admin/site/upload-file-editor"
        });
    </script>
@endsection

