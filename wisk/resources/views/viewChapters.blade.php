@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ url('/addChapter') }} " class="btn btn-default">Hoofdstuk toevoegen</a>



        @foreach($allChapters as $key => $value)
        <a href="{{ url('chap/edit/'. $value->id) }} " class="chap btn btn-primary"><h3>{{ $value->nr }}  {{ $value->chapter }}</h3></a>
            @foreach($allSubchapter as $key => $x)
                @if($value->id == $x->chapter_id)
                        <a href="{{ url('sub/edit/'. $x->id) }} " class="sub btn btn-default text-center">{{ $x->nr }} {{ $x->name }}</a>
                @endif
            @endforeach

        @endforeach




</div>
@endsection
