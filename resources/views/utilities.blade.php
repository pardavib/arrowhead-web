@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <h1>Utilities</h1>
        <h2>Run tests</h2>
        <p>The following buttons actually run the code using the REST API.</p>
        <br />
        <a href="#" role="button" class="btn btn-success btn-large">Populate Cloud A logs</a>
        <a href="#" role="button" class="btn btn-success btn-large">Populate Cloud B logs</a>
        <a href="#" role="button" class="btn btn-success btn-large">Populate messages</a>
        <br />
        <br />
        <div class="row">
            <div class="col-md-6">
                <h3>Cloud A status</h3>
                <p>DB name: {{Session::get('databaseA')}}</p>
                <p>Address: {{Session::get('addressA')}}</p>
                <p>Username: {{Session::get('usernameA')}}</p>
            </div>
            <div class="col-md-6">
                <h3>Cloud B status</h3>
                <p>DB name: {{Session::get('databaseB')}}</p>
                <p>Address: {{Session::get('addressB')}}</p>
                <p>Username: {{Session::get('usernameB')}}</p>
            </div>
        </div>
    </div>
@endsection
