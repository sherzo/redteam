<div class="calendarDatas">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
        <!-- Wrapper for slides -->
        <div class="carousel-inner carouselWithMeses" role="listbox">
            <div class="item  active  nameMonth">
                <h3>@{{ month }}</h3>
                <div class="daysCalendar">
                    <div class="dataDays">d</div>
                    <div class="dataDays">l</div>
                    <div class="dataDays">m</div>
                    <div class="dataDays">m</div>
                    <div class="dataDays">j</div>
                    <div class="dataDays">v</div>
                    <div class="dataDays">s</div>
                </div>
                <div class="daysNumberCalendar">
                    
                    {{-- For del calendario  --}}
                    <div class="dataDays" 
                        v-for="(c, i) in calendar" 
                        :class="{ 'dayDomingo': c.dayOfWeek == 0,
                                  'dayEvento' : c.events.length > 0 } " 
                        @mouseover="showEvents(i)" 
                        @mouseout="showEvents(i)">
                        
                        {{-- Si no hay eventos --}}
                        <span v-if="c.day && c.events.length == 0">@{{ c.dayShow }}</span>
                        
                        {{-- Si hay eventos --}}
                        <div class="ui button" v-if="c.events.length > 0">@{{ c.dayShow }}</div>
                        
                        {{-- Popup --}}
                        <div class="ui special popup" 
                            v-if="c.events.length > 0"
                            :class="{ 'top left transition visible': c.show }"
                            style="margin-top: 50px;">
                            
                            {{-- Listado de eventos --}}
                            <div class="header" v-for="e in c.events">
                                @{{ e.title }}
                            </div>
                        </div>
                    
                    </div>
                    {{-- End For --}}
                
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" @click="prevMonth">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next" @click="nextMonth">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>