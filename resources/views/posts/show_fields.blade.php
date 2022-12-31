<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/posts.fields.title').':') !!}
    <p>{{ $post->title }}</p>
</div>

<!-- Subject Field -->
<div class="col-sm-12">
    {!! Form::label('subject', __('models/posts.fields.subject').':') !!}
    <p>{{ $post->subject }}</p>
</div>

<!-- Publisher Field -->
<div class="col-sm-12">
    {!! Form::label('publisher', __('models/posts.fields.publisher').':') !!}
    <p>{{ $post->publisher }}</p>
</div>

<!-- Published At Field -->
<div class="col-sm-12">
    {!! Form::label('published_at', __('models/posts.fields.published_at').':') !!}
    <p>{{ $post->published_at }}</p>
</div>

