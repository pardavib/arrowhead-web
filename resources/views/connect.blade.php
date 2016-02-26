@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Connections</h1>
            <p>Please connect to your Arrowhead database(s) by providing the
                required credentials.</p>
            <br />
            <br />
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Connect to Cloud A</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/connect') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">IP address</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" value="127.0.0.1">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('database') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Database name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="database" value="arrowhead">

                                    @if ($errors->has('database'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('database') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Database username</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="root">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Database password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-refresh"></i>Cloud A Connect
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Connect to Cloud B</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/connect') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">IP address</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address2" value="127.0.0.1">

                                    @if ($errors->has('address2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('database2') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Database name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="database2" value="arrowhead">

                                    @if ($errors->has('database2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('database2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username2') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Database username</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username2" value="root">

                                    @if ($errors->has('username2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password2') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Database password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password2">

                                    @if ($errors->has('password2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-refresh"></i>Cloud B Connect
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
