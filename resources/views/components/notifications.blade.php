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
        </div>
    </div>
</div>