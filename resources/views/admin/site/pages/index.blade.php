@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Страницы</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Страницы</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header py-3">
            <a href="{{route('admin.site.pages.create')}}" type="button" class="btn add-item btn-primary px-5">Добавить</a>
        </div>
        <div class="card-body">
            @include('admin.includes.result_massage')
            <div class="table-responsive">
                <table class="table align-middle table-striped">
                    <thead class="table-light">
                    <tr>
                        <th>Заголовок</th>
                        <th>Ссылка</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td><span>{{$page->title}}</span></td>
                            <td><a href="{{url($page->slug)}}">{{url($page->slug)}}</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{route('admin.site.pages.edit', $page->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a onclick="destroy(event)" href="#" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    <form id="destroy-form" action="{{route('admin.site.pages.destroy', $page->id)}}" method="POST" style="display: none;">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
