@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Usuario</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}

                            <div class="form-group">
                                {!! Form::label('email', 'Correo Electrónico') !!}
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Por favor, introduzca su e-mail']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Contraseña') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('first_name', 'Primer Nombre') !!}
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('last_name', 'Apellido') !!}
                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('type', 'Tipo de Usuario') !!}
                                {!! Form::select('type', ['' => 'Seleccione tipo', 'user' => 'Usuario', 'admin' => 'Administrador'], null, ['class' => 'form-control']); !!}
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
