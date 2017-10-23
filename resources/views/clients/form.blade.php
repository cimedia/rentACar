<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Client name','class' => 'form-control')) !!}
            <strong>Surname:</strong>
            {!! Form::text('surname', null, array('placeholder' => 'Client surname','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button class="btn btn-primary">Save</button>
    </div>
</div>