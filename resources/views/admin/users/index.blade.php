@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    @if (Session::has('message') )
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif

                    <div class="panel-body">
                        <p>
                            <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">
                                Nuevo Usuario
                            </a>
                        </p>
                        <p>Hay {{ $users->total() }} registros, distribuidos en {{ $users->lastPage() }} páginas.</p>
                        @include('admin.users.partials.table')
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

{!! Form::open(['route' => ['admin.users.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@endsection




@section('scripts')
<script>
    $(document).ready(function(){
        //alert("Documento Listo");
        $('.btn-delete').click(function(e){

            e.preventDefault(); //previene que se recargue la pagina

            var row = $(this).parents('tr'); //obteniendo la fila
            var id = row.data('id'); //obtenemos el id correspondiente
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID', id);
            var data = form.serialize();


            $.post(url, data, function(result){
                alert(result);
            });
            //alert(data);
            //alert(url);
            //alert(id);
            //alert('boton llamado');
        })
    });
</script>


@endsection()