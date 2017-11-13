@extends('layouts.app')

@section('content')

<div class="container">
    <li><a href="{{ url('/addSubChapter') }} " class="">Subhoofdstuk toevoegen</a></li>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Nr</td>
            <td>Subhoofdstuk</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
    @foreach($subChapter as $key => $value)
        <tr>
            <td>{{ $value->nr }}</td>
            <td>{{ $value->name }}</td>

            <td>
                {{ Form::open(array('url' => 'delete/' . $value->id)) }}
                {{ Form::hidden('_method', 'post') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}

                Oefeningen</a>
            </td>
        </tr>


    @endforeach

        </tbody>
    </table>

</div>
@endsection
