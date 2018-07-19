<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">
    @isset($promotion)
    <div class="row">
	    <div class="col-md-12">
	    	<h3>Editar promoción</h3>
	    </div>
    </div>
 	@endisset

    @isset($promotion)
    <div class="col-md-6 col-md-offset-3">
		<img src="{{ $promotion->image }}" class="img-responsive" alt="">
	</div>
	@endisset
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales dataInformationPersonal">
		
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Imagen</label>
            <input type="file" name="image" required>
        </div>
    </div>
</div>