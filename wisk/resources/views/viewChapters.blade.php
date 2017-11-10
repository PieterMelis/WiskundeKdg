@extends('layouts.app')

@section('content')

<div class="container">

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Nr</td>
            <td>Hoofdstuk</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
    @foreach($allChapters as $key => $value)
        <tr>
            <td>{{ $value->nr }}</td>
            <td>{{ $value->chapter }}</td>

            <td>


                {{ Form::open(array('url' => 'delete/' . $value->id)) }}
                {{ Form::hidden('_method', 'post') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-error')) }}
                {{ Form::close() }}


            </td>
        </tr>


    @endforeach

        </tbody>
    </table>

</div>
@endsection
