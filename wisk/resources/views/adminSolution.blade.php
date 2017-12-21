@extends('layouts.app')

@section('content')

<div class="container">




        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#home">Oplossingen beheren</a></li>
            <li><a data-toggle="pill" href="#menu1">Later bekijken</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">

                <h1>Oplossingen beheren</h1>
                @foreach($solution as $key => $value)
                    @if($value->view == 0)

                        <div class="card card-product-hover">
                            <div class="card-product-hover-details">
                                <h3 class="card-product-hover-title">{{ $value->title }}</h3>
                            </div>
                            <img src="{{ asset('img/uploads/')."/".$value->picture }}" alt="oefening" />

                            <div class="card-product-hover-details">
                                @foreach($chapters as $key => $chap)
                                    @if($chap->id == $value->chapter)
                                        <p>Hoofdstuk: {{ $chap->chapter }}</p>
                                        <p>Oefening: {{ $value->exercise }}</p>
                                    @endif
                                @endforeach
                                <span class="card-product-hover-price">{{ $value->userName }}</span><br>
                                <span class="card-product-hover-price">{{ $value->email }}</span>
                            </div>
                            <a class="btn btn-small btn-success " href="{{ URL::to('solution/good/' . $value->id) }}">Goed</a>
                            <a class="btn btn-small btn-danger " href="{{ URL::to('solution/bad/' . $value->id) }}">Fout</a>

                            <a class="btn btn-small btn-info " href="{{ URL::to('solution/later/' . $value->id) }}">Later bekijken</a>

                        </div>
                    @endif



                @endforeach





            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">

                        <h1>Later bekijken</h1>
                        @foreach($solution as $key => $value)
                            @if($value->view == 2)

                                <div class="card card-product-hover">
                                    <div class="card-product-hover-details">
                                        <h3 class="card-product-hover-title">{{ $value->title }}</h3>
                                    </div>
                                    <img src="{{ asset('img/uploads/')."/".$value->picture }}" alt="oefening" />

                                    <div class="card-product-hover-details">
                                        @foreach($chapters as $key => $chap)
                                            @if($chap->id == $value->chapter)
                                                <p>Hoofdstuk: {{ $chap->chapter }}</p>
                                                <p>Oefening: {{ $value->exercise }}</p>
                                            @endif
                                        @endforeach
                                        <span class="card-product-hover-price">{{ $value->userName }}</span><br>
                                        <span class="card-product-hover-price">{{ $value->email }}</span>
                                    </div>
                                    <a class="btn btn-small btn-success " href="{{ URL::to('solution/good/' . $value->id) }}">Goed</a>
                                    <a class="btn btn-small btn-danger " href="{{ URL::to('solution/bad/' . $value->id) }}">Fout</a>


                                </div>
                            @endif



                        @endforeach


                    </div>
        </div>





</div>
@endsection
