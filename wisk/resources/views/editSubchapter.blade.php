@extends('layouts.app')

@section('content')

<div class="container">





        {{ Html::ul($errors->all()) }}

        {{ Form::model($sub, array('url' => array('sub/update', $sub->id), 'method' => 'post')) }}

        <div class="form-group">
            {{ Form::label('nr', 'Nr') }}
            {{ Form::text('nr', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Title') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>


        {{ Form::submit('Hoofstuk aanpassen', array('class' => 'button')) }}

        {{ Form::close() }}

</div>
@endsection
