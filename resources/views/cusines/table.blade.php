<div class="table-responsive">
    <table class="table" id="cusines-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cusines as $cusine)
            <tr>
                <td>{{ $cusine->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cusines.destroy', $cusine->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cusines.show', [$cusine->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cusines.edit', [$cusine->id]) }}" class='btn btn-default btn-xs'>
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
