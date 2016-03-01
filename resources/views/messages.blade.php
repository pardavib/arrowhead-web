@extends('layouts.app')

@section('content')
    <div class="col-md-5">
        <h1>Cloud A messages</h1>
        <?php $i = 0 ?>
        @foreach($logsA as $log)
            @if($log->direction == "OUT" && $log->cloud=="A")
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$i}}:
                            <i class="fa fa-btn fa-arrow-left"></i>
                            {{$log->message}}</h3>
                    </div>
                </div>

            @else
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$i}}:
                            <i class="fa fa-btn fa-arrow-right"></i>
                            {{$log->message}}
                            <small>| {{$log->created_at->format('H:i:s')}}</small>
                        </h3>
                    </div>
                </div>
                <?php $i++ ?>
            @endif
        @endforeach
    </div>
    <div class="col-md-5 col-md-offset-2">
        <h1>Cloud B messages</h1>
        <?php $i = 0 ?>
        @foreach($logsB as $log)
            @if($log->direction == "OUT" && $log->cloud=="B")
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$i}}:
                            <i class="fa fa-btn fa-arrow-left"></i>
                            {{$log->message}}</h3>
                    </div>
                </div>
            @else
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$i}}:
                            <i class="fa fa-btn fa-arrow-right"></i>
                            {{$log->message}}
                            <small>| {{$log->created_at->format('H:i:s')}}</small>
                        </h3>
                    </div>
                </div>
                <?php $i++ ?>
            @endif
        @endforeach
    </div>
@endsection