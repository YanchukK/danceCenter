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
    {!!Form::text('title', null, ['class' => 'form-control', 'placeholder' => ' title', 'required']) !!}
    {!!Form::text('desc', null, ['class' => 'form-control', 'placeholder' => ' Description', 'required']) !!}
    <br>
    <div class="form-group">
        {{Form::file('news_img')}}
    </div>
    <p></p>
</div>