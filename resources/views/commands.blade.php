@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-danger">This feature is under construction!</div>
        <h1>Commands</h1>
        <p>Run custom REST API commands using this tool.</p>
        <br />
        <br />
        <label for="basic-url">Target URL and HTTP method:</label>
        <div class="input-group">
            <span class="input-group-addon" id="basic-url">https://example.com/arrowhead/</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default">GET</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"><span class="caret"></span> <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#">PUT</a></li>
                    <li><a href="#">POST</a></li>
                    <li><a href="#">DELETE</a></li>
                </ul>
            </div>
        </div>
        <br />
        <label for="payload">JSON payload:</label>
        <textarea class="form-control" id="payload" rows="8"></textarea>
        <br />
        <label for="response">Response:</label>
        <p><i>No response available...</i></p>
    </div>
@endsection