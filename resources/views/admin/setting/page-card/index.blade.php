@extends('layouts.admin')
@section('content')

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Настройки</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Страница карточек</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-8 offset-1">
            <div class="card">
                <div class="card-body">
                    @include('admin.includes.result_massage')
                    <form method="POST" action="{{ route('admin.setting.page-card.update') }}">
                        {{ csrf_field()  }}
                        <div class="border p-3 rounded">
                            @foreach($setting as $option)
                            <div class="row mb-3">
                                <label for="{{ $option->name }}" class="col-sm-3 col-form-label">{{ ucfirst($option->name)  }}</label>
                                <div class="col-sm-9">
                                    <input value="{{ $option->value }}" name="{{ $option->name }}" type="text" class="form-control" id="{{ $option->name }}" placeholder="{{ $option->name }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

