<div class="captionActivitiesRecientes" style="padding-top: 0;">
    <h3 class="fontMiriamProSemiBold">Actividades recientes</h3>
    <div class="notficiActivitie" >
        <div class="ui relaxed divided list" >
            <div class="item PublicatiOn" v-for="n in notifications" :class="{ 'PublicatiOn': n.type == 0, 'ActivitiPago': n.type == 1, 'NewFotos': n.type > 1 }">
                
                <i class="large github middle aligned icoPubli" v-if="n.type == 0"></i>
                <i class="large github middle aligned icoPagos" v-else-if="n.type == 1"></i>
                <i class="large github middle aligned icoFotos" v-else-if="n.type == 2"></i>
                <i class="large github middle aligned icoDocumn" v-else-if="n.type == 3"></i>
                <i class="large github middle aligned icoCumple" v-else-if="n.type == 4"></i>
                <i class="large github middle aligned icoLikes" v-else-if="n.type == 5"></i>
                <i class="large github middle aligned icoComentarios" v-else-if="n.type == 6"></i>
                <i class="large github middle aligned icoUrgente" v-else-if="n.type == 7"></i>
                <i class="large github middle aligned icoProFile" v-else-if="n.type == 8"></i>
                <i class="large github middle aligned icoCalendar" v-else></i>
                
                <div class="content">
                    <a href="#!" class="header datanotifiNew" v-html="n.data">
                       <!-- <strong class="nameUserNotifique">@{{ n.user.name }} </strong> Ha realizado una nueva <span class="typeAccionNotifi">
                        publicación</span>-->
                    </a>
                </div>
            </div>
            <div class="item PublicatiOn" v-show="notifications.length == 0">
                
                <div class="content">
                    <a href="#!" class="header datanotifiNew">
                        <strong class="nameUserNotifique ">No hay notificaciones </strong>
                    </a>
                </div>
            </div>
            {{--
            <div class="item NewFotos">
                <i class="large github middle aligned icoFotos"></i>
                <div class="content">
                    <a data-href='preview-conte/data/viewDme//' href="#!" class="header datanotifiNew"><strong class="nameUserNotifique ">Juan Alberto </strong> Ha publicado nuevas <span class="typeAccionNotifi">fotos</span>
                    </a>
                </div>
            </div>

            <div class="item NewFotos">
                <i class="large github middle aligned icoDocumn"></i>
                <div class="content">
                    <a data-href='preview-conte/data/viewDme//' href="#!" class="header datanotifiNew"><strong class="nameUserNotifique ">Juan Alberto </strong>  Ha publicado un nuevo <span class="typeAccionNotifi">documento</span>
                    </a>
                </div>
            </div>

            <div class="item NewFotos">
                <i class="large github middle aligned icoUrgente"></i>
                <div class="content">
                    <a data-href='preview-conte/data/viewDme//' href="#!" class="header datanotifiNew"><strong class="nameUserNotifique ">Juan Alberto </strong>  Tiene una publicacion urgente <span class="typeAccionNotifi">urgente</span>
                        <input type="hidden" class="notifiview" name='datanotifi' value="">
                        <input type="hidden" class="notifiviewUser" name='datanotifi_iduser' value="">
                    </a>
                </div>
            </div>
            CHECK

            <div class="item NewFotos">
                <i class="large github middle aligned icoCalendar"></i>
                <div class="content">
                    <a data-href='calendario' href="#!" class="header datanotifiNew"><strong class="nameUserNotifique ">Juan Alberto </strong> agrego un nuevo evento al calendario <span class="typeAccionNotifi">al calendario</span>
                        <input type="hidden" class="notifiview" name='datanotifi' value="">
                        <input type="hidden" class="notifiviewUser" name='datanotifi_iduser' value="">
                    </a>
                </div>
            </div>
            CHECK 

            <div class="item NewFotos">
                <i class="large github middle aligned icoProFile"></i>
                <div class="content">
                    <a data-href="profile-users/" href="#!" class="header datanotifiNew"><strong class='nameUserNotifique ' >Juan Alberto </strong>  actualizo su perfil
                        <input type="hidden" class="notifiview" name='datanotifi' value="">
                        <input type="hidden" class="notifiviewUser" name='datanotifi_iduser' value="">
                    </a>
                </div>
            </div>
            CHECK

            <div class="item NewFotos">
                <i class="large github middle aligned icoCumple"></i>
                <div class="content">
                    <a  data-href='preview-conte/data/viewDme//' href="#!" class="header datanotifiNew">Hoy es el cumpleaños de <strong class="nameUserNotifique ">Juan Alberto </strong>
                        <input type="hidden" class="notifiview" name='datanotifi' value="">
                        <input type="hidden" class="notifiviewUser" name='datanotifi_iduser' value="">
                    </a>
                </div>
            </div>
            CHECK

            <div class="item NewFotos">
                <i class="large github middle aligned icoLikes"></i>
                <div class="content">
                    <a  data-href='preview-conte/data/viewDme//' href="#!" class="header datanotifiNew">
                        <input type="hidden" class="notifiview" name='datanotifi' value="">
                        <input type="hidden" class="notifiviewUser" name='datanotifi_iduser' value="">
                    </a>
                </div>
            </div>
            CHECK

            <div class="item NewFotos">
                <i class="large github middle aligned icoComentarios"></i>
                <div class="content">
                    <a  data-href='preview-conte/data/viewDme//' href="#!" class="header datanotifiNew"> <span class="typeAccionNotifi">Juan Alberto</span> comento tu publicacion
                        <input type="hidden" class="notifiview" name='datanotifi' value="">
                        <input type="hidden" class="notifiviewUser" name='datanotifi_iduser' value="">
                    </a>
                </div>
            </div>
            <div class="item ActivitiPago">
                <i class="large github middle aligned icoPagos"></i>
                <div class="content">
                    <a class="header">¡Se ha realizado el pago a las 7:00 P.M.!</a>
                </div>
            </div>--}}
        </div>
    </div>
</div>