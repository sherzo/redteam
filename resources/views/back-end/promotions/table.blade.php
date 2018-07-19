 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueUsersAll">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUserTitles">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
            <p style="margin-left: 50px;">Creador por</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
            <p>Imgenes <span>({{ $promotions->count()}})</span> </p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <p>Fecha de creación</p>
        </div>
    </div>
    @forelse($promotions as $promotion)
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUser">
            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-2 imgAndNameUser">
                <div class="dropdown DropOptinUsersD optionAllUsers">
                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li>
                            <a href="{{ route('promotions.edit', $promotion->id) }}">Editar información</a>
                        </li>
                        <li>
                            {{--<a href="{{ route('users.schedule', $user->id) }}">Editar horario</a>--}}
                        </li>
                        <li>
                            {{ Form::open(['route' => ['promotions.destroy', $promotion->id], 'method' => 'DELETE'])}}
                                <input type="submit" value="Eliminar">
                            {{ Form::close() }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                {{ $promotion->user->full_name }}
            </div>
            <div class="col-md-2">
                 <img src="{{ $promotion->image }}" class="img-responsive" alt="">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-offset-2 col-md-3 col-lg-3 EmailUser topDatasUser">
                <p>{{ $promotion->created_at }}</p>
            </div>
        </div>
    </div>
    @empty
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer text-center"><br><br>
            <h5>No se encontraron resultados</h5>
        </div>
    @endforelse
</div>