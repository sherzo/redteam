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
        'title' => 'Agregar promoción',
        'placeholder' => 'Buscar por nombre de usuario',
        'action' => 'users.search'
    ])
    {{-- SECTION BLOQUE NOTIFICACION Y MENSAJES --}}
    @if(!isset($promotion))
    	<form action="{{ route('promotions.store') }}" method="post"  class="formEditUser" enctype="	multipart/form-data"  ref="myForm">
    @endif

	@isset($promotion)
    	<form action="{{ route('promotions.update', $promotion->id) }}" method="post"  class="formEditUser" enctype="multipart/form-data"  ref="myForm">
        <input type="hidden" name="_method" value="PUT">
    @endisset
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 OtherUserEdit">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionCenEdituser" id="schedules">
            	<h3></h3>
                {{--
                <p class="alert alert-success">El usuario se creo con exito</p>

                --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					@include('back-end.promotions.field')

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


	
            </div>
        </div>
        <!-- END BLOCK CLOCK -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 submitEditU">
            <input type="submit" value='Aceptar'>
        </div>

    </section>
    </form>
@endsection

@section('js')
@endsection