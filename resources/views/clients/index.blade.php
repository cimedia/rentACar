@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clients</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Add a new client</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th></th>
        </tr>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->name}}</td>
                <td>{{ $client->surname}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('clients.edit', $client->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $clients->links() !!}
@endsection