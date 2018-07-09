@extends('layouts.admin')

@section('css')
<style>
    .activeDay {
        background: #039be5 !important;
        color: white !important;
    }

    .disabledDay {
        pointer-events: none;
        opacity: 0.4;
    }

    .msgError {
        background: #ef6e6e;
        float: left;
        margin-left: 15%;
        width: 50%;
        padding-left: 2%;
        padding: 1%;
        color: #131212;
        font-family: 'MyrianPro-Regular';
    }
</style>
@endsection

@section('content')

    @include('components.header-admin', [
        'title' => 'Agregar empleado',
        'placeholder' => 'Buscar por nombre de usuario',
        'action' => 'users.search'
    ])
	
	{{-- SECTION BLOQUE NOTIFICACION Y MENSAJES --}}
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 OtherUserEdit">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionCenEdituser" id="schedules">
                {{--
                <p class="alert alert-success">El usuario se creo con exito</p>

                --}}
                <form action="{{ route('users.store') }}" method="post"  class="formEditUser" enctype="multipart/form-data" @submit="save" ref="myForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					@include('back-end.users.partials.fields')
	
				</form>
			</div>
		</div>
	</section>
@endsection

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/clock/bootstrap-clockpicker.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/src/horarios.js') }}"></script>
{{--
<script src="{{ asset('assets/js/admin/main_horarios.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/admin/main_horarios_edit.js') }}" type="text/javascript"></script>
    --}}
@endsection