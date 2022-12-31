<div class="table-responsive">
    <table class="table" id="games-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Company</th>
        <th>Story</th>
        <th>Price</th>
        <th>Year</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>{{ $game->name }}</td>
            <td>{{ $game->company }}</td>
            <td>{{ $game->story }}</td>
            <td>{{ $game->price }}</td>
            <td>{{ $game->year }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['games.destroy', $game->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('games.show', [$game->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('games.edit', [$game->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
