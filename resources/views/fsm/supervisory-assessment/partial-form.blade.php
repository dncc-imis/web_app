<div class="card-body">
    <div class="form-group row required">
        {!! Form::label('holding_number','Holding Number',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('holding_number', null, ['class' => 'form-control', 'placeholder' => 'Enter Holding Number']) !!}
        </div>
    </div>
    
    <div class="form-group row required">
    {!! Form::label('owner_name', 'Owner Name', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('owner_name', $owner_detail ? $owner_detail->owner_name : null, ['class' => 'form-control', 'placeholder' => 'Enter Owner Name']) !!}
    </div>
    </div>

    <div class="form-group row required">
        {!! Form::label('owner_gender', 'Owner Gender', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::select('owner_gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], $owner_detail ? $owner_detail->owner_gender : null, ['class' => 'form-control', 'placeholder' => 'Select Gender']) !!}
        </div>
    </div>

    <div class="form-group row required">
        {!! Form::label('owner_contact', 'Owner Contact', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('owner_contact', $owner_detail ? $owner_detail->owner_contact : null, ['class' => 'form-control', 'placeholder' => 'Enter Contact Number']) !!}
        </div>
    </div>

    
    <div class="form-group row required">
    {!! Form::label('containment_type', 'Containment Type', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('containment_type', $type_id ? ($containment_type[$type_id] ?? 'Unknown Type') : null, ['class' => 'form-control', 'placeholder' => 'Enter Containment Type']) !!}
    </div>
    </div>

    <div class="form-group row required">
        {!! Form::label('containment_outlet_connection','Containment Outlet Connection',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('containment_outlet_connection', null, ['class' => 'form-control', 'placeholder' => 'Enter Outlet Connection']) !!}
        </div>
    </div>
    
    <div class="form-group row required">
        {!! Form::label('containment_volume','Containment Volume',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('containment_volume', $containment ? $containment->size : null, ['class' => 'form-control', 'placeholder' => 'Enter Containment Volume']) !!}
        </div>
    </div>
    
    <div class="form-group row required">
        {!! Form::label('road_width','Road Width',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('road_width', null, ['class' => 'form-control', 'placeholder' => 'Enter Road Width']) !!}
        </div>
    </div>
    
    <div class="form-group row required">
        {!! Form::label('distance_from_nearest_road','Distance from Nearest Road',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('distance_from_nearest_road', null, ['class' => 'form-control', 'placeholder' => 'Enter Distance']) !!}
        </div>
    </div>

    <div class="form-group row required">
        {!! Form::label('septic_tank_length','Septic Tank Length',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('septic_tank_length', $containment ? $containment->tank_length : null, ['class' => 'form-control', 'placeholder' => 'Enter Distance']) !!}
        </div>
    </div>

    <div class="form-group row required">
        {!! Form::label('septic_tank_width','Septic Tank Width',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('septic_tank_width',  $containment ? $containment->tank_width : null, ['class' => 'form-control', 'placeholder' => 'Enter Distance']) !!}
        </div>
    </div>

    <div class="form-group row required">
        {!! Form::label('septic_tank_depth','Septic Tank Depth',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('septic_tank_depth', $containment ? $containment->depth : null, ['class' => 'form-control', 'placeholder' => 'Enter Distance']) !!}
        </div>
    </div>


    <div class="form-group row required">
    {!! Form::label('number_of_pit_rings', 'Number of Pit Rings', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::number('number_of_pit_rings', null, ['class' => 'form-control', 'placeholder' => 'Enter Number of Pit Rings']) !!}
    </div>
</div>

<div class="form-group row required">
    {!! Form::label('pit_diameter', 'Pit Diameter', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('pit_diameter', null, ['class' => 'form-control', 'placeholder' => 'Enter Pit Diameter']) !!}
    </div>
</div>

<div class="form-group row required">
    {!! Form::label('pit_depth', 'Pit Depth', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('pit_depth', null, ['class' => 'form-control', 'placeholder' => 'Enter Pit Depth']) !!}
    </div>
</div>

<div class="form-group row required">
    {!! Form::label('appropriate_desludging_vehicle_size', 'Appropriate Desludging Vehicle Size', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('appropriate_desludging_vehicle_size', null, ['class' => 'form-control', 'placeholder' => 'Enter Desludging Vehicle Size']) !!}
    </div>
</div>

<div class="form-group row required">
    {!! Form::label('number_of_trips', 'Number of Trips', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::number('number_of_trips', null, ['class' => 'form-control', 'placeholder' => 'Enter Number of Trips']) !!}
    </div>
</div>

<div class="form-group row required">
    {!! Form::label('confirmed_emptying_date', 'Confirmed Emptying Date', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::date('confirmed_emptying_date', $application ? $application->proposed_emptying_date : null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row required">
    {!! Form::label('advance_paid_amount', 'Advance Paid Amount', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::number('advance_paid_amount', null, ['class' => 'form-control', 'placeholder' => 'Enter Advance Paid Amount', 'step' => '0.01']) !!}
    </div>
</div>

    
</div>
<div class="card-footer">
<a href="{{ action('Fsm\ApplicationController@index') }}" class="btn btn-info">Back to List</a>
    {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
</div>


