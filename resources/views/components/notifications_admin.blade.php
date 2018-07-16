<div class="captionActivitiesRecientes" style="padding-top: 0;">
    <h3 class="fontMiriamProSemiBold">Actividades recientes</h3>
    <div class="notficiActivitie" >
        <div class="ui relaxed divided list" >
             @foreach($notifications as $recent)
                <div class="item {{ $recent->class }}">
                    <i class="large github middle aligned {{ $recent->icon }}"></i>

                    <div class="content">
                        <a class="header">{!! $recent->data !!}</a>
                    </div>
                </div> 
            @endforeach 
        </div>
    </div>
</div>