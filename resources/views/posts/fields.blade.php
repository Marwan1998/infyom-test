<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::textarea('subject', null, ['class' => 'form-control']) !!}
</div>