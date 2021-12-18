@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Меню сайта</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('admin.site.menu-items.index')}}">Пункты меню</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Добавить пункт</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="border p-3 rounded">
                @include('admin.includes.result_massage')
                <h6 class="mb-0 text-uppercase">Добавить пункт</h6>
                <hr>
                <form class="row g-3" method="POST" action="{{ route('admin.site.menu-items.update', $menuItem->id) }}">
                    {{ csrf_field()  }}
                    {{ method_field('PATCH')  }}

                    <div class="col-6">
                        <label class="form-label">Заголовок</label>
                        <input value="{{ old('title', $menuItem->title) }}" name="title" type="text" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Ссылка</label>
                        <input value="{{ old('url', $menuItem->url) }}" name="url" type="text" class="form-control">
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

