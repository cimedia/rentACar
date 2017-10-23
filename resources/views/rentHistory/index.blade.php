@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Rent history</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rentHistory.create') }}"> Add a new rental data</a>
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
            <th>Client</th>
            <th>Car</th>
            <th>Rental date</th>
            <th>Return date</th>
            <th></th>
        </tr>
        @foreach ($rentHistory as $rentHistoryRow)
            <tr>
                <td>{{ $rentHistoryRow->client}}</td>
                <td>{{ $rentHistoryRow->car}}</td>
                <td>{{ $rentHistoryRow->rentDate}}</td>
                <td>{{ $rentHistoryRow->returnDate}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('rentHistory.edit', $rentHistoryRow->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $rentHistory->links() !!}
@endsection