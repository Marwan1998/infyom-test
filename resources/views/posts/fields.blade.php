<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/posts.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', __('models/posts.fields.subject').':') !!}
    {!! Form::text('subject', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Publisher Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publisher', __('models/posts.fields.publisher').':') !!}
    {!! Form::text('publisher', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Published At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published_at', __('models/posts.fields.published_at').':') !!}
    {!! Form::text('published_at', null, ['class' => 'form-control','id'=>'published_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#published_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush