@extends('layouts.app')

@section('content')
    <div class="col-md-5">
        <h1>Cloud A messages</h1>
        @foreach($logs as $log)
            @if($log->direction == "OUT")
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-btn fa-arrow-left"></i>
                            {{$log->message}}</h3>
                    </div>
                </div>
            @else
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-btn fa-arrow-right"></i>
                            {{$log->message}}</h3>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="col-md-5 col-md-offset-2">
        <h1>Cloud B messages</h1>

        <p><i>Cloud B is not connected...</i></p>
    </div>
@endsection