{!! Form::open(['route' => ['admin.users.destroy', $user], 'method' => 'DELETE']) !!}

    <button type="submit" class="btn btn-danger">Eliminar usuario</button>
{!! Form::close() !!}