@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{$lang->name}} язык</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('admin.cards.index', ['lang' => $lang->id])}}}}">Карточки</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Добавить</li>
                </ol>
            </nav>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.cards.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card">
            <div class="card-header py-3">
                <h5 class="card-title">Добавить карточку</h5>
            </div>
            <div class="card-body">
                <div class="border p-4 rounded">
                    @include('admin.includes.result_massage')
                    <div class="row mb-3">
                        <label for="letter" class="col-sm-3 col-form-label">Буква</label>
                        <div class="col-sm-9">
                            <input value="{{ old('letter') }}" name="letter" type="text" class="form-control" id="letter" placeholder="Буква">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="word" class="col-sm-3 col-form-label">Слово</label>
                        <div class="col-sm-9">
                            <input value="{{ old('word') }}" name="word" type="text" class="form-control" id="word" placeholder="Слово">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="translation" class="col-sm-3 col-form-label">Перевод</label>
                        <div class="col-sm-9">
                            <input value="{{ old('translation') }}" name="translation" type="text" class="form-control" id="translation" placeholder="Перевод">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Звук</label>
                        <div class="col-sm-9">
                            <input name="sound" class="form-control" type="file" id="sound" placeholder="Звук">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Картинка на лицо</label>
                        <div class="col-sm-9">
                            <input value="{{ old('img_front') }}" name="img_front" class="form-control" type="file" id="img_front" placeholder="Картинка на лицо">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <select name="media" id="media-back-select" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                <option selected="" value="img_back"> Картинка на оборот</option>
                                <option value="video">Видео</option>
                            </select>
                        </div>
                        <div class="col-sm-9">
                            <input name="img_back" class="form-control" type="file" id="media-back-input" placeholder="Картинка на оборот">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary px-5">Сохранить</button>
                        </div>
                    </div>
                    <input type="hidden" name="language_id" value="{{$lang->id}}">
                </div>
            </div>
        </div>
    </form>
@endsection

