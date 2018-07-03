 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog contPusblishDialogo" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 continPublish">
                    <form class="sectionPublichUser" accept-charset="utf-8" @submit.prevent="addPublication" enctype="multipart/form-data">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <textarea name="" v-model="description" placeholder="Escribe un comentario" required=""></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions">
                            <div class="col-md-6 actionpuBlish">
                                <div class="col-md-2 Adjuntar">
                                    <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="" onclick="document.getElementById('fileInput').click()">
                                    <input type="file" id="fileInput" ref="myFile" style="display: none" @change="getFile">
                                </div>

                                <div class="col-md-2 AdjuntarFoto" onclick="document.getElementById('imageInput').click()">
                                    <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                    <input type="file" id="imageInput" ref="myImage" style="display: none" @change="getImage">
                                </div>
                                
                                <div class="col-md-2 DestacarPuslish" @click="selectFeatured" >
                                    <img class="img-responsive" src="{{ asset('assets/images/avatar/destacarIco.png') }}" alt="">
                                </div>
                                <div class="col-md-2 AlertPublish" @click="selectEmergency">
                                    <img class="img-responsive" src="{{ asset('assets/images/avatar/alertIco.png') }}" alt="">
                                </div>
                            </div>
                           
                            <div class="col-md-6 ButtinPublish">
                                <input type="submit" value="Enviar"></input>
                                <button type="button" class="btn btn-default close-modal hide" data-dismiss="modal" id="close-modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>