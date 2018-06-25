<div id="carousel-example-generic2" class="carousel slide slide1Even" data-ride="carousel" data-interval="false">
    <!-- Indicators -->
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
		 <div class="item  active ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 v" style="margin-top: 3px;">
                <h1>@{{ month }}</h1>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 vTypeEvento">
                    <h2>Calendario de actividades</h2>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 vDataPublic">
                    <h2>Publicado por:</h2>
                </div>
            </div>

            <div class="captioncalendarMoth">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionCalendarType" v-for="e in events" v-if="events.length > 0">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 vDataPublicType">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fechasEventos">
                            <span>@{{ e.day | showDay }}</span>
                            <p class="DayPubliEvent">@{{ e.title }}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ChatWithUserDatas vDataPublicTypeUSer">

                        <div class="dataImhgEvent" :style="{ 'background-image': 'url(' + e.user.avatar + ')' }">
                        </div>
                        <p class="colorBlack fontMiriamProSemiBold">@{{ e.user.name }}</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionCalendarType" v-if="events.length == 0">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 vDataPublicType">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fechasEventos">
                            <span></span>
                            <p class="DayPubliEvent">No hay eventos este mes</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ChatWithUserDatas vDataPublicTypeUSer">
                    </div>
                </div>	
            </div>
        </div>
     </div>
</div>