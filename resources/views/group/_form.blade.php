<div class="form-group">
    {!!Form::text('title', null, ['class' => 'form-control', 'placeholder' => ' title', 'required']) !!}
    <br>
    {!! Form::select(
         'teacher_id',
         $teachers_list,
         isset($selected_teachers) ? $selected_teachers : null,
         ['class' => 'form-control', 'required']
     ) !!}
    <br>
    {!! Form::select(
         'style_id',
         $styles_list,
         isset($selected_styles) ? $selected_styles : null,
         ['class' => 'form-control', 'required']
     ) !!}
    <br>
    {!! Form::select(
         'branch_id',
         $branches_list,
         isset($selected_branches) ? $selected_branches : null,
         ['class' => 'form-control', 'required']
     ) !!}
    <br>
    {!! Form::select(
         'customer_id[]',
         $customers_list,
         isset($selected_customers) ? $selected_customers : null,
         ['class' => 'form-control', 'required', 'multiple']
     ) !!}
    <br>

    {!!Form::text('date_time', null, ['class' => 'form-control', 'type' => 'date', 'placeholder' => 'Data&Time of training']) !!}
    <br>
    <p></p>
</div>