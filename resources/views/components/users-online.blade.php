<div class="captionUsersInLive" id="online">
    <div class="ui accordion">
        <h3 class="fontMiriamProRegular"><span class="estusLive">•</span>En Linea</h3>
        <div class="title col-xs-12 col-sm-12 col-md-12 col-lg-12 AlluserReegitrados columnChatss captionLikechatsFlotante captionLikechatsFlotanteDta">
            
            <div class="captionCircleUser captionDenoews AlluserReegitradosPorBloque" v-for="o in online">
                <a href="{{ url('chats') }}" class="userLive" data-idonline="2" data-iduserchat="2">
                    <img :src="o.avatar | showImage" alt="" class="img-responsive">
                </a>
            </div>
        </div>
    </div>
</div>