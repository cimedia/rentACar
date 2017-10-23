@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new rental data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rentHistory.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            There was a problem adding the rental data<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'rentHistory.store','method'=>'POST')) !!}
    @include('rentHistory.form')
    {!! Form::close() !!}

@endsection
