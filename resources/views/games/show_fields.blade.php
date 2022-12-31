<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $game->name }}</p>
</div>

<!-- Company Field -->
<div class="col-sm-12">
    {!! Form::label('company', 'Company:') !!}
    <p>{{ $game->company }}</p>
</div>

<!-- Story Field -->
<div class="col-sm-12">
    {!! Form::label('story', 'Story:') !!}
    <p>{{ $game->story }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $game->price }}</p>
</div>

<!-- Year Field -->
<div class="col-sm-12">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $game->year }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $game->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $game->updated_at }}</p>
</div>

