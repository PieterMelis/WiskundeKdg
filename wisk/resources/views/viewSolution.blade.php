@extends('layouts.app')

@section('content')

<div class="container">





    <h1>{{$subChapter->chapter}}</h1>

    @foreach($solution as $key => $value)
        @if($value->view == 1 )

        <div class="card card-product-hover">
            <div class="card-product-hover-details">
                <h3 class="card-product-hover-title">{{ $value->title }}</h3>
            </div>
            <img src="{{ asset('img/uploads/')."/".$value->picture }}" alt="oefening" />

            <div class="card-product-hover-details">
                <h3 class="card-product-hover-title">{{ $value->exercise }}</h3>
                <span class="card-product-hover-price">{{ $value->userName }}</span>
            </div>
        </div>
            @endif
    @endforeach


</div>
@endsection
