@extends('layouts.app')

@section('content')

<div class="container">








    <h1>Oplossingen beheren</h1>
    @foreach($solution as $key => $value)
    @if($value->view == 0)

        <div class="card card-product-hover">
            <div class="card-product-hover-details">
                <h3 class="card-product-hover-title">{{ $value->title }}</h3>
            </div>
            <img src="{{ asset('img/uploads/')."/".$value->picture }}" alt="oefening" />

            <div class="card-product-hover-details">
                <h3 class="card-product-hover-title">{{ $value->exercise }}</h3>
                <span class="card-product-hover-price">{{ $value->userName }}</span>
            </div>
            <a class="btn btn-small btn-success " href="{{ URL::to('solution/good/' . $value->id) }}">Goed</a>
            <a class="btn btn-small btn-danger " href="{{ URL::to('solution/bad/' . $value->id) }}">Fout</a>

        </div>

    @endif
    @endforeach


</div>
@endsection
