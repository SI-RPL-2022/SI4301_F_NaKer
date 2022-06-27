@extends('admin.app')

@section('content')
<style>
    table { 
        border-collapse: separate;
        border-spacing: 5px;
        width:100%;
    }
    .bodyt,td{
        border-radius: 15px;
        background:#EDEDED;
        height:36px;
        text-align: center;
    }
    .headt, th{
        border-radius: 15px;
        background:#A3B18A;
        height:36px;
        text-align: center;
    }
</style>
<div class="container mt-5 mb-5">
    <h3>Log Report</h3>
    <table>
        <tr class="headt">
            <th>Log ID</th>
            <th>Datetime</th>
            <th>Username/User ID</th>
            <th>Activity</th>
            <th>Type</th>
            <th>Page</th>
        </tr>
        @foreach($logf as $logff)
        <tr class="bodyt">
            <td>{{ $logff->id }}</td>
            <td>{{ $logff->created_at }}</td>
            <td>{{ $logff->name }}/{{ $logff->user_type }}</td>
            <td>{{ $logff->activity }}</td>
            <td>{{ $logff->type }}</td>
            <td>{{ $logff->page }}</td>
        </tr>
        @endforeach
        @foreach($logp as $logpp)
        <tr class="bodyt">
            <td>{{ $logpp->id }}</td>
            <td>{{ $logpp->created_at }}</td>
            <td>{{ $logpp->name }}/{{ $logpp->user_type }}</td>
            <td>{{ $logpp->activity }}</td>
            <td>{{ $logpp->type }}</td>
            <td>{{ $logpp->page }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection