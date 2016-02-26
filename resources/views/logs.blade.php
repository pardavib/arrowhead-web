@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <h1>Log viewer</h1>
        <table class="table table-striped table-bordered" id="users-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Origin</th>
                <th>Level</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            </thead>
        </table>
    </div>
@stop
@push('scripts')
<script>
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('logs.data', ['cloud' => $cloud]) !!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'origin', name: 'origin'},
                {data: 'level', name: 'level'},
                {data: 'message', name: 'message'},
                {data: 'date', name: 'date'}
            ],
            "columnDefs": [
                {"width": "30%", "targets": 3}
            ]
        });
    });
</script>
@endpush