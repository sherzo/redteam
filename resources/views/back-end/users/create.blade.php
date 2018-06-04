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

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/clock/bootstrap-clockpicker.min.js') }}" type="text/javascript" ></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker()
        .find('input').change(function() {
        console.log(this.value);
    });
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>
<script src="{{ asset('assets/js/admin/main_horarios.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/admin/main_horarios_edit.js') }}" type="text/javascript"></script>
@endsection