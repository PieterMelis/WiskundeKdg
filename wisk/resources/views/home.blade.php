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
                        <br>
                        <table class="table table-bordered">
                            <thead>

                            </thead>
                            <tbody>
                            @foreach($allChapters as $key => $value)
                                    <h3>{{ $value->nr }}  {{ $value->chapter }}</h3>
                                @foreach($allSubchapters as $key => $x)
                                    @if($value->id == $x->chapter_id)
                                    <li class="ex">{{ $x->nr }} {{ $x->name }}
                                        <a class="btn btn-small btn-success" href="{{ URL::to('solution/' . $x->id) }}">Oefeningen</a>
                                    </li>


                                    @endif
                                @endforeach
                            @endforeach

                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>
@endsection
