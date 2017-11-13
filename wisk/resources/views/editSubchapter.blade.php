@extends('layouts.app')

@section('content')

<div class="container">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif



        {{ Html::ul($errors->all()) }}

        {{ Form::model($sub, array('url' => array('sub/update', $sub->id), 'method' => 'post')) }}

        <div class="form-group">
            {{ Form::label('nr', 'Nr') }}
            {{ Form::text('nr', null, ['class' => 'form-control']) }}
        </div>

        {{ Form::label('chapter', 'Hoofdstuk',array('class' => 'required'))  }}

        <select name="chapter" id="chapter">
            @foreach($allChapters as $chapter)
                <option value="{{$chapter->name}}">{{$chapter->nr}} {{$chapter->chapter}}</option>
            @endforeach
        </select>


        {{ Form::submit('Hoofstuk aanpassen', array('class' => 'button')) }}

        {{ Form::close() }}

</div>
@endsection
