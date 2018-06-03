@extends('layouts.admin')

@section('content')

    @include('components.header-admin', [
        'title' => 'Agregar empleado',
        'placeholder' => 'Buscar por nombre de usuario'
    ])
	
	{{-- SECTION BLOQUE NOTIFICACION Y MENSAJES --}}
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 OtherUserEdit">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionCenEdituser">
                {{--
                <p class="alert alert-success">El usuario se creo con exito</p>

                --}}
                <form action="{{ route('users.store') }}" method="post"  class="formEditUser" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					@include('back-end.users.partials.fields')
	

				</form>
			</div>
		</div>
	</section>


@endsection
