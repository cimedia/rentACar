<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Client:</strong>
            {!! Form::select('client_id', $clients) !!}
            <strong>Car:</strong>
            {!! Form::select('car_id', $cars) !!}
            <strong>Rental date:</strong>
            {!! Form::text('rentDate', null, array('placeholder' => 'yyyy-mm-dd hh:mm:ss','class' => 'form-control')) !!}
            <strong>Return date:</strong>
            {!! Form::text('returnDate', null, array('placeholder' => 'yyyy-mm-dd hh:mm:ss','class' => 'form-control'))
             !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button class="btn btn-primary">Save</button>
    </div>
</div>