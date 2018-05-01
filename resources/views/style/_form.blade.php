<div class="form-group">
    {!!Form::text('title', null, ['class' => 'form-control', 'placeholder' => ' title', 'required']) !!}
    <br>
    <div class="form-group">
        {{Form::file('style_img')}}
    </div>
    <p></p>
</div>