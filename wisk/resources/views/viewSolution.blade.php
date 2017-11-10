@extends('layouts.app')

@section('content')

<div class="container">




<h1>{{$chapter->chapter}}</h1>
    @foreach($solution as $key => $value)
        <tr>
            <td>{{ $value->title }}</td>
            <td>{{ $value->exercise }}</td>
            <td>{{ $value->userId }}</td>
            <img class="card-img" src="{{ asset('img/uploads/')."/".$value->picture }}" alt="header" />
        </tr>
    @endforeach


</div>
@endsection
