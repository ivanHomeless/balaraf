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
                                    <svg stroke-width="0.501" stroke-linejoin="bevel" fill-rule="evenodd" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" overflow="visible" width="36pt" height="36pt" viewBox="0 0 36 36">
                                        <g fill="none" stroke="black" font-family="Times New Roman" font-size="16" transform="scale(1 -1)">
                                            <g transform="translate(0 -36)">
                                                <g class="layer-1">

                                                    <g class="group" stroke-linejoin="miter" stroke="none" stroke-width="1" fill="#FFDB70" stroke-miterlimit="79.8403193612775">
                                                        <g class="group-1">
                                                            <path d="M 14.094,22.191 L 14.094,22.189 L 19.629,25.386 C 20.264,25.754 20.548,25.123 20.522,24.578 L 20.522,18.035 L 20.522,11.461 C 20.551,10.552 20.231,10.265 19.568,10.72 L 14.094,13.883 L 14.094,13.879 L 10.184,13.879 C 8.812,14.486 8.449,21.193 10.184,22.191 L 14.094,22.191 Z" marker-start="none" marker-end="none"></path>
                                                        </g>
                                                    </g>
                                                    <g class="group-2 play" fill="#e5e5e5" stroke-linejoin="miter" stroke="none" stroke-width="1" stroke-miterlimit="79.8403193612775">
                                                        <g class="group-3">
                                                            <path d="M 23.058,18.035 C 23.058,16.873 22.61,15.816 21.876,15.026 L 22.415,14.496 C 23.282,15.422 23.813,16.666 23.813,18.035 C 23.813,19.404 23.282,20.648 22.415,21.573 L 21.876,21.046 C 22.61,20.255 23.058,19.198 23.058,18.035 Z" marker-start="none" marker-end="none"></path>
                                                        </g>
                                                    </g>
                                                    <g class="group-4  play" fill="#e5e5e5" stroke-linejoin="miter" stroke="none" stroke-width="1" stroke-miterlimit="79.8403193612775">
                                                        <g class="group-6">
                                                            <path d="M 24.883,18.035 C 24.883,16.461 24.276,15.03 23.282,13.959 L 24.011,13.243 C 25.186,14.496 25.908,16.182 25.908,18.035 C 25.908,19.889 25.186,21.572 24.011,22.827 L 23.282,22.11 C 24.276,21.041 24.883,19.609 24.883,18.035 Z" marker-start="none" marker-end="none"></path>
                                                        </g>
                                                    </g>
                                                    <g class="group-6 play" fill="#e5e5e5" stroke-linejoin="miter" stroke="none" stroke-width="1" stroke-miterlimit="79.8403193612775">
                                                        <g class="group-7">
                                                            <path d="M 27.002,18.035 C 27.002,15.908 26.18,13.974 24.839,12.53 L 25.825,11.561 C 27.411,13.254 28.386,15.531 28.386,18.035 C 28.386,20.539 27.411,22.815 25.825,24.51 L 24.839,23.541 C 26.18,22.096 27.002,20.162 27.002,18.035 Z" marker-start="none" marker-end="none"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
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
