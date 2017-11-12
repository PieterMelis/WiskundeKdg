@extends('layouts.app')

@section('content')

<div class="container">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

        {{ Html::ul($errors->all(), array('class' => 'errors'))}}

        {{ Form::open(['url' => 'solution','files' => true])}}
        {{ csrf_field() }}

        <div class="form-group">
            {{ Form::label('title', 'Titel',array('class' => 'required'))  }}
            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
        </div>

        <select name="chapter" id="chapter">
            @foreach($chapter as $chapter)
                <option value="{{$chapter->id}}">{{$chapter->nr}} {{$chapter->chapter}}</option>
            @endforeach
        </select>
        <select name="subchapter" id="subchapter">
            @foreach($subChapter as $subchapter)
                <option value="{{$subchapter->id}}">{{$subchapter->chapter}} {{$subchapter->nr}} {{$subchapter->name}}</option>
            @endforeach
        </select>

        <div class="form-group">
            {{ Form::label('exercise', 'Oefening',array('class' => 'required'))  }}
            {{ Form::text('exercise', Input::old('exercise'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            <input type="file" name="image" id="image" class="required">
        </div>

        {{ Form::submit('Toevoegen', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}


</div>
@endsection
