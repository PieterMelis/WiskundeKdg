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

        <div class="form-group">
            {{ Form::label('chapter', 'Hoofdstuk',array('class' => 'required'))  }}
            {{ Form::text('chapter', Input::old('chapter'), array('class' => 'form-control')) }}
        </div>

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
