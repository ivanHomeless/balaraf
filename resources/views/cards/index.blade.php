@extends('layouts.card')
@section('content')
    <div class="alphabet-cards">
        <div class="row">
        @foreach($lang->cards as $card)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 alphabet-cards__wrap">
                    <div class="alphabet-cards__item route-card" data-index="{{ $loop->index}}" id="card-{{$card->id}}" data-id="{{$card->id}}">
                        <div class="alphabet-cards__front" style="
                                background:  url( {{ $card->img_front }}) no-repeat;
                                background-size: cover;
                                ">
                            <div class="alphabet-cards__front-background">
                                <div class="alphabet-cards__letter">
                                    {{ $card->letter }}
                                </div>
                            </div>
                        </div>
                        <div class="alphabet-cards__back">
                            <div class="alphabet-cards__back-top">
                                <div class="alphabet-cards__back-letter">
                                    {{ $card->letter }}
                                </div>
                                <div class="alphabet-cards__back-sound"
                                data-sound="{{asset($card->sound)}}">
                                    <img src="/public/images/sound.png" alt="">
                                </div>
                            </div>
                            <div class="alphabet-cards__back-word">
                                {{ $card->word }}
                            </div>
                            <div class="alphabet-cards__back-translation">
                                {{ $card->translation }}
                            </div>
                            <div class="alphabet-cards__back-img">
                                @if ($card->img_back)
                                    <img width="180" src="{{ asset($card->img_back) }}" alt="">
                                    {{--<div class="alphabet-cards__back-picture"
                                        style="background: url('{{asset($card->img_back)}}')"
                                    ></div>--}}
                                @endif
                                @if ($card->video)
                                        <video controls="controls" >
                                            <source src="{{ asset($card->video) }}" type='video/ogg; codecs="theora, vorbis"'>
                                            <source src="{{ asset($card->video) }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                            <source src="{{ asset($card->video) }}" type='video/webm; codecs="vp8, vorbis"'>
                                            Тег video не поддерживается вашим браузером.
                                        </video>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
    <div class="overlay"></div>
@endsection
