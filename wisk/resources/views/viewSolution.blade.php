@extends('layouts.app')

@section('content')

<div class="container">


    @foreach($solution as $key => $value)
        <tr>
            <td>{{ $value->title }}</td>
            <td>{{ $value->exercise }}</td>
            <img class="card-img" src="{{ asset('img/uploads/')."/".$value->picture }}" alt="header" />


        </tr>


    @endforeach


</div>
@endsection
