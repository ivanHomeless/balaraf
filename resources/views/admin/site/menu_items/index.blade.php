@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Меню сайта</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Пункты меню</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header py-3">
            <a href="{{route('admin.site.menu-items.create')}}" type="button" class="btn add-item btn-primary px-5">Добавить</a>
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
                    @foreach($menuItems as $item)
                        <tr>
                            <td><span>{{$item->title}}</span></td>
                            <td><a href="{{url($item->url)}}">{{url($item->url)}}</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{route('admin.site.menu-items.edit', $item->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a onclick="destroy(event, {{$item->id}})" href="#" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    <form id="destroy-form-{{$item->id}}" action="{{route('admin.site.menu-items.destroy', $item->id)}}" method="POST" style="display: none;">
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
