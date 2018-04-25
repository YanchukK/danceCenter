<div class="form-group">
    {!!Form::text('title', null, ['class' => 'form-control', 'method' => 'POST', 'placeholder' => ' title', 'required']) !!}
    <br>
    {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => ' name']) !!}
    <br>
    {!!Form::text('address', null, ['class' => 'form-control', 'placeholder' => ' address']) !!}
    <br>
    {!!Form::text('p_number', null, ['class' => 'form-control', 'placeholder' => ' phone number']) !!}
    <br>
    {!!Form::text('w_hours', null, ['class' => 'form-control', 'placeholder' => ' work hours']) !!}
    <br>
    <div class="form-group">
        {{Form::file('branch_img')}}
    </div>
    <p></p>
</div>