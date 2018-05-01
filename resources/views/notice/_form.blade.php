<div class="form-group">
    {!!Form::text('body', null, ['class' => 'form-control', 'placeholder' => 'body', 'required']) !!}
    <br>
    {!! Form::select(
         'group_id',
         $groups_list,
         isset($selected_groups) ? $selected_groups : null,
         ['class' => 'form-control', 'required']
     ) !!}
    <br>
    <p></p>
</div>