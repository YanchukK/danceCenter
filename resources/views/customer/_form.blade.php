<div class="form-group">
    {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => ' Name', 'required']) !!}
    <br>
    {!!Form::text('l_name', null, ['class' => 'form-control', 'placeholder' => ' Last name']) !!}
    <br>
    {!!Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    <br>
    {!!Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'login']) !!}
    <br>
    {!!Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'password']) !!}
    <br>
    {!!Form::text('p_number', null, ['class' => 'form-control', 'placeholder' => 'phone number']) !!}
    <br>
    <div class="form-group">
        {{Form::file('customer_img')}}
    </div>
    <p></p>
</div>