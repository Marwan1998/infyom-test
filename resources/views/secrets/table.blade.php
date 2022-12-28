<div class="table-responsive">
    <table class="table" id="secrets-table">
        <thead>
        <tr>
            <th>Title</th>
        <th>Content</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($secrets as $secret)
            <tr>
                <td>{{ $secret->title }}</td>
            <td>{{ $secret->content }}</td>
            <td>{{ $secret->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['secrets.destroy', $secret->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('secrets.show', [$secret->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('secrets.edit', [$secret->id]) }}"
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
