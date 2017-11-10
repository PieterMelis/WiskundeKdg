@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="links">
                            <a href="{{ url('/addChapter') }} " class="">Hoofdstuk toevoegen</a>
                            <a href="{{ url('/viewChapters') }} " class="">Al de hoofdstuken</a>
                            <a href="{{ url('/addSolution') }} " class="">Oplossing toevoegen</a>
                        </div>
<br>
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


                                        <a class="btn btn-small btn-success" href="{{ URL::to('chapter/' . $value->id) }}">Oefeningen</a>
                                    </td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>



            </div>
        </div>
    </div>
</div>
@endsection
