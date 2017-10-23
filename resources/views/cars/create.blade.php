@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new car</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cars.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            There was a problem adding the car<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'cars.store','method'=>'POST')) !!}
    @include('cars.form')
    {!! Form::close() !!}

@endsection
