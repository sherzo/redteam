<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 geleriFotosUser fotoUserFake">
    <h3>Galería de fotos</h3>
    <img class="img-responsive clImgView" src="{{ asset('assets/images/galeriFotos.jpg') }}" alt=""  data-toggle="modal" data-target="#myModalswPost">

    <!-- Modal -->
    <div class="modal fade" id="myModalswPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog dialoDataImgen" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-responsive" src="{{ asset('assets/images/galeriFotos.jpg') }}}" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>