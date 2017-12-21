@extends('layouts.app')

@section('content')

<div class="container">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    {{ Html::ul($errors->all(), array('class' => 'errors'))}}
    {{ Form::open(['url' => 'subChapter','files' => true])}}
    <div class="form-group">
        {{ Form::label('nr', 'Nr',array('class' => 'required'))  }}
        {{ Form::selectRange('nr', 1, 20, Input::old('nr'), array('class' => 'form-control'))}}
    </div>
        <div class="form-group">
            {{ Form::label('name', 'Titel',array('class' => 'required'))  }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>
    <div class="form-group">
            {{ Form::label('chapter', 'Hoofdstuk',array('class' => 'required'))  }}
            <select name="chapter" id="chapter">
                @foreach($allChapters as $chapter)
                    <option value="{{$chapter->id}}">{{$chapter->nr}} {{$chapter->chapter}}</option>
                @endforeach
            </select>
    </div>
    {{ Form::submit('Subhoofdstuk toevoegen', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>
@endsection
