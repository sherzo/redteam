<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog contPusblishDialogo" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 continPublish">
                    <form action="addPosts" method="post" class="sectionPublichUser" accept-charset="utf-8" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-xs-12 col-sm-12 col-md-12 dataCOmentssTex">
                            <textarea name="descrip_posts" placeholder="Escribe un comentario"></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions">
                            <div class="contenMoreDocuments">
                                <input type="file" class="fileInput" name="fileInputDocuemnt[]" />
                            </div>
                            <div class="contenMoreDocuments">
                                <input type="file" class="fileInput2" name="fileInputDocuemnt[]" />
                            </div>
                            <div class="contenMoreDocuments">
                                <input type="file" class="fileInput3" name="fileInputDocuemnt[]" />
                            </div>
                            <div class="contenMoreDocuments">
                                <input type="file" class="fileInput4" name="fileInputDocuemnt[]" />
                            </div>
                            <div class="contenMoreDocuments">
                                <input type="file" class="fileInput5" name="fileInputDocuemnt[]" />
                            </div>
                            <div class="contenMoreDocuments">
                                <input type="file" class="fileInput6" name="fileInputDocuemnt[]" />
                            </div>
                            <div class="contenMoreDocuments">
                                <input type="file" class="fileInput7" name="fileInputDocuemnt[]" />
                            </div>

                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage2" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage3" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage4" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage5" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage6" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage7" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage8" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage9" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage10" name="fileInputImage[]" />
                            </div>
                            <div class="contenMoreImages">
                                <input type="file" class="fileInputImage11" name="fileInputImage[]" />
                            </div>

                            <div class="col-md-6 actionpuBlish">
                                <div class="col-md-2 Adjuntar">
                                    <img class="img-responsive img1Do" onclick="chooseFileDocu()" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="">
                                </div>
                                <div class="col-md-2 AdjuntarFoto">
                                    <img class="img-responsive imImga" onclick="chooseFileImage();" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                </div>
                                <div class="col-md-2 DestacarPuslish">
                                    <img class="img-responsive" src="{{ asset('assets/images/avatar/destacarIco.png') }}" alt="">
                                </div>
                                <div class="col-md-2 AlertPublish">
                                    <img class="img-responsive" src="{{ asset('assets/images/avatar/alertIco.png') }}" alt="">
                                </div>
                            </div>
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" class="post_perso" name="post_personalizado">
                            <input type="hidden" class="post_urgente" name="post_purgent">

                            <div class="col-md-6 ButtinPublish">
                                <input type="submit" value="Enviar"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>