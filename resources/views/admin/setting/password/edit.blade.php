@extends('layouts.admin')
@section('content')

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Настройки</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Сменить пароль</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-8 offset-1">
            <div class="card">
                <div class="card-body">
                    @include('admin.includes.result_massage')
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Сменить пароль</h6>
                        <hr>
                        <form class="row g-3" method="POST" action="{{ route('admin.setting.password.update', 1)  }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="col-12">
                                <label class="form-label">Пароль</label>
                                <input name="password" type="password" class="form-control">
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
        </div>
    </div>
@endsection

