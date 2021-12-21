@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{$card->language->name}} язык</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{route('admin.cards.index', ['lang' => $card->language->id])}}">Карточки</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Карточка {{mb_strtoupper($card->letter) }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.cards.update', $card->id) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PATCH') }}
        <div class="card">
            <div class="card-header py-3">
                <h5 class="card-title">Карточка {{mb_strtoupper($card->letter) }}</h5>
            </div>
            <div class="card-body">
                <div class="border p-4 rounded">
                    @include('admin.includes.result_massage')
                    <div class="row mb-3">
                        <label for="letter" class="col-sm-3 col-form-label">Буква</label>
                        <div class="col-sm-9">
                            <input value="{{ old('letter', $card->letter) }}" name="letter" type="text" class="form-control" id="letter" placeholder="Буква">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="word" class="col-sm-3 col-form-label">Слово</label>
                        <div class="col-sm-9">
                            <input value="{{ old('word', $card->word) }}" name="word" type="text" class="form-control" id="word" placeholder="Слово">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="translation" class="col-sm-3 col-form-label">Перевод</label>
                        <div class="col-sm-9">
                            <input value="{{ old('translation', $card->translation) }}" name="translation" type="text" class="form-control" id="translation" placeholder="Перевод">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Звук</label>
                        <div class="col-sm-9 media-view">
                            <div class="media-edit">
                                <audio controls>
                                    <source src="{{ asset($card->sound)  }}" type="audio/ogg; codecs=vorbis">
                                    <source src="{{ asset($card->sound)  }}" type="audio/mpeg">
                                    Тег audio не поддерживается вашим браузером.
                                </audio>
                            </div>
                            <input name="sound" class="input-file form-control" type="file" id="sound" placeholder="Звук">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Картинка на лицо</label>
                        <div class="col-sm-9 media-view">
                            <div class="media-edit">
                                <img class="img-responsive" src="{{ asset($card->img_front) }}" alt="">
                            </div>
                            <input name="img_front" class="form-control input-file" type="file" id="img_front" placeholder="Картинка на лицо">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <select name="media" id="media-back-select" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                <option {{ $card->image_back ? 'selected' : '' }} value="img_back"> Картинка на оборот</option>
                                <option {{ $card->video ? 'selected' : '' }} value="video">Видео</option>
                            </select>
                        </div>
                        <div class="col-sm-9">
                            <div class="media-back-content media-view">
                                <div class="{{(!$card->img_back) ? 'hide' : '' }} media-img_back media-edit">
                                    <img class="img-responsive" src="{{ asset($card->img_back)}}" alt="">
                                </div>
                                <div class="{{(!$card->video) ? 'hide' : '' }} media-video media-edit">
                                    <video controls="controls" >
                                        <source src="{{ asset($card->video) }}" type='video/ogg; codecs="theora, vorbis"'>
                                        <source src="{{ asset($card->video) }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                        <source src="{{ asset($card->video) }}" type='video/webm; codecs="vp8, vorbis"'>
                                        Тег video не поддерживается вашим браузером.
                                    </video>
                                </div>
                                <input name="{{$card->img_back ? 'img_back' : 'video' }}" class="input-file form-control" type="file" id="media-back-input" placeholder="Картинка на оборот">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="reset" class="btn btn-warning px-5" onclick="location.reload()">Отмена</button>
                            <button type="submit" class="btn btn-primary px-5">Сохранить</button>
                        </div>
                    </div>
                    <input type="hidden" name="language_id" value="{{$card->language->id}}">
                </div>
            </div>
        </div>
    </form>
@endsection

