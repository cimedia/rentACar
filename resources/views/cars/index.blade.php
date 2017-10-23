@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cars</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cars.create') }}"> Add a new car</a>
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
            <th></th>
        </tr>
        @foreach ($cars as $car)
            <tr>
                <td>{{ $car->name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('cars.edit', $car->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $cars->links() !!}
@endsection