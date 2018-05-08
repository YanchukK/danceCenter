@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    {!!Form::text('login', null, ['class' => 'form-control','placeholder' => 'Login', 'required']) !!}
    <br>
    {!!Form::text('password', null, ['class' => 'form-control', 'type' => 'password', 'placeholder' => 'Password']) !!}
    <br>
    {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Teacher Name']) !!}
    <br>
    {!!Form::text('l_name', null, ['class' => 'form-control', 'placeholder' => 'Last name']) !!}
    <br>
    {!!Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    <br>
    {!!Form::text('p_number', null, ['class' => 'form-control', 'placeholder' => 'Phone number']) !!}
    <br>
    <div class="form-group">
        {{Form::file('teacher_img')}}
    </div>
    <p></p>
</div>