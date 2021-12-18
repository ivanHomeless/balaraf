@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header py-3">
                <div class="row g-3 align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Последние карточки</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-striped">
                        <thead class="table-light">
                        <tr>
                            <th>Буква</th>
                            <th>Язык</th>
                            <th>Слово</th>
                            <th>Перевод</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td class="productlist">
                                    <a class="d-flex align-items-center gap-2" href="#">
                                        <div class="product-box">
                                            <img src="{{ asset($card->img_front) }}" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 product-title">{{$card->letter}}</h6>
                                        </div>
                                    </a>
                                </td>
                                <td><span>{{$card->language->name}}</span></td>
                                <td><span>{{$card->word}}</span></td>
                                <td><span>{{$card->translation}}</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('admin.cards.edit', $card->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a onclick="destroy(event, {{$card->id}})" href="#" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        <form id="destroy-form-{{$card->id}}" action="{{route('admin.cards.destroy', $card->id)}}" method="POST" style="display: none;">
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
    </div>

    <div class="col">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0">Последние страницы</h5>
            </div>
            <div class="card-body">
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
                                        <a onclick="destroy(event, {{$page->id}})" href="#" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        <form id="destroy-form-{{$page->id}}" action="{{route('admin.site.pages.destroy', $page->id)}}" method="POST" style="display: none;">
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
    </div>
</div>
@endsection
