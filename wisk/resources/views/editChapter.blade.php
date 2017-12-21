@extends('layouts.app')

@section('content')

<div class="container">
        {{ Html::ul($errors->all()) }}
        {{ Form::model($chap, array('url' => array('chap/update', $chap->id), 'method' => 'post')) }}
        <div class="form-group">
            {{ Form::label('nr', 'Nr') }}
            {{ Form::text('nr', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('chapter', 'Hoofdstuk') }}
            {{ Form::text('chapter', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Hoofstuk aanpassen', array('class' => 'button')) }}
        {{ Form::close() }}
</div>
@endsection
