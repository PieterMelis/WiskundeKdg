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
    @foreach($subChapter as $key => $value)
        <tr>
            <td>{{ $value->nr }}</td>
            <td>{{ $value->name }}</td>

            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('solution/' . $value->id) }}">Oefeningen</a>
            </td>
        </tr>


    @endforeach

        </tbody>
    </table>

</div>
@endsection
