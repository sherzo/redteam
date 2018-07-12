 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueUsersAll">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUserTitles">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
            <p>Todos los contatos <span>({{ $users->count()}})</span> </p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <p>Correo</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
            <p>Celular</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
            <p>Ext.</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <p>Ranking</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
            <p>ADP</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
            <p>Puntaje</p>
        </div>
    </div>
    @forelse($users as $user)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUser">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 imgAndNameUser">
                <div class="dropdown DropOptinUsersD optionAllUsers">
                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li>
                            <a href="{{ route('users.edit', $user->id) }}">Editar información</a>
                        </li>
                        <li>
                            {{--<a href="{{ route('users.schedule', $user->id) }}">Editar horario</a>--}}
                        </li>
                        <li>
                            {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE'])}}
                                <input type="submit" value="Eliminar">
                            {{ Form::close() }}
                        </li>
                    </ul>
                </div>

                <input type="checkbox" class="datSelectEdit" value="3">
                <a href="{{ url('profile', $user->username)}}">
                    <div class="label dataPrubeIm dataProfileAllUsers" style="background-image: url('{{ $user->avatar }}')"></div>
                    
                </a>
                <p class="fontMiriamProSemiBold">{{ $user->full_name }}</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 EmailUser topDatasUser">
                <p>{{ $user->email }}</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 CelUsers topDatasUser">
                <p>{{ $user->work->phone }}</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 ExtUsers topDatasUser">
                <p>{{ $user->work->extension }}</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 RankinUsers topDatasUser">
                <div class="ui star rating disabled" data-rating="{{ $user->stars }}"></div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 AdpUsers topDatasUser">
                <p>0</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 NotUses topDatasUser">
                <p>{{ $user->score != null ? $user->score : 0 }}</p>
            </div>
        </div>
    </div>
    @empty
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
            <h5>No se encontraron resultados</h5>
        </div>
    @endforelse
</div>