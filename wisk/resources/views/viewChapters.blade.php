@extends('layouts.app')

@section('content')

<div class="container">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ url('/addChapter') }} " class="btn btn-default">Hoofdstuk toevoegen</a>
    <a href="{{ url('/viewSubChapters') }} " class="btn btn-default">Subhoofdstuk toevoegen</a>


        @foreach($allChapters as $key => $value)
        <a href="{{ url('chap/edit/'. $value->id) }} " class="chap btn btn-primary"><h3>{{ $value->nr }}  {{ $value->chapter }}
                {{ Form::open(array('url' => 'chapter/delete/' . $value->id)) }}
                {{ Form::hidden('_method', 'post') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger ')) }}
                {{ Form::close() }}
            </h3>

        </a>
            @foreach($allSubchapter as $key => $x)
                @if($value->id == $x->chapter_id)
                        <a href="{{ url('sub/edit/'. $x->id) }} " class="sub btn btn-default text-center">{{ $x->nr }} {{ $x->name }}
                            {{ Form::open(array('url' => 'subchapter/delete/' . $x->id)) }}
                            {{ Form::hidden('_method', 'post') }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger ')) }}
                            {{ Form::close() }}
                        </a>
                @endif
            @endforeach

        @endforeach




</div>
@endsection
