@extends('layouts.app')

@section('content')

<div class="container">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    {{ Html::ul($errors->all(), array('class' => 'errors'))}}

    {{ Form::open(['url' => 'chapter','files' => true])}}
    <div class="form-group">
        {{ Form::label('nr', 'Nr',array('class' => 'required'))  }}
        {{ Form::selectRange('nr', 1, 20, Input::old('nr'), array('class' => 'form-control'))}}

    </div>
    <div class="form-group">
        {{ Form::label('chapter', 'Hoofdstuk',array('class' => 'required'))  }}
        {{ Form::text('chapter', Input::old('chapter'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Hoofdstuk toevoegen', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}


</div>
@endsection
