<div id="sidebar"> 
    <ul>
        <li id='titleAdmin'><a href="{{ url('home') }}">Administrador</a></li>
        <li>
            <a href="home" class="{{ url('admin/home') }}"> Dashboards</a>
        </li>
        <li>
            <a href="chat" class="mensageIco">  Mensajes</a>
        </li>
        <li>
            <a href="sugerencias" class="usgerenIco"> Sugerencias</a>
        </li>
        <li>
            <a href="emergencias" class="emergenciasIco"> Emergencias</a>
        </li>
        <li>
            <a href="solicitud-permisos" class="permisoIco">  Permisos</a>
        </li>
        <li>
            <a href="calendario" class="calendarIco"> Calendario</a>
        </li>
        <li>
            <a href="documentos" class="documentIco">  Documentos</a>
        </li>

        <!-- 2 BLOQUE SUBmENU -->
        <li class="lineDivide">
            <a href="#!"></a>
        </li>
        <li class="2TwoBlow">
            <a href="{{ route('users.edit', 1) }}" class="EditUseIco"> Editar Usuarios</a>
        </li>
        <li class="2TwoBlow">
            <a href="{{ route('users.create') }}" class="AddUseIco"> Agregar Usuarios</a>
        </li>
        <li class="2TwoBlow">
            <a href="{{ route('users.index') }}" class="UseIco"> Usuarios</a>
        </li>
        <li class="2TwoBlow">
            <a href="ranking" class="rannkingIco"> Ranking</a>
        </li>
        <li class="2TwoBlow">
            <a href="evaluaciones-mensuales" class="evalucionIco"> Evaluaciones</a>
        </li>
    </ul>
</div>

<div class="main-content">
    <a href="#" class="togleAdmin" data-toggle=".container" id="sidebar-toggle">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </a>
    <div id="sidebar3">
        <ul>
            <li class="topHome">
                <a href="home">
                    <img src="{{ asset('assets/images/icons/home.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="chat">
                    <img src="{{ asset('assets/images/icons/message.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="sugerencias">
                    <img src="{{ asset('assets/images/icons/sguerencias.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="emergencias">
                    <img src="{{ asset('assets/images/icons/emergencias.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="solicitud-permisos">
                    <img src="{{ asset('assets/images/icons/permisos.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="calendario">
                    <img src="{{ asset('assets/images/icons/calendar.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="documentos">
                    <img src="{{ asset('assets/images/icons/documentos.png') }}" class="img- responsive" alt="">
                </a>
            </li>


            <!-- 2 SECTION -->
            <li class="top2Bloque">
                <a href="{{ route('users.edit', 1) }}">
                    <img src="{{ asset('assets/images/icons/edit-user.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ route('users.create') }}">
                    <img src="{{ asset('assets/images/icons/add-user.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <img src="{{ asset('assets/images/icons/users.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="usuarios">
                    <img src="{{ asset('assets/images/icons/ranking.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="ranking">
                    <img src="{{ asset('assets/images/icons/evaluation.png') }}" class="img- responsive" alt="">
                </a>
            </li>

            <li class="topChangeColor">
                <a href="evaluaciones-mensuales">
                    <img src="{{ asset('assets/images/icons/changeCOlor.png') }}" class="img- responsive" alt="">
                </a>
            </li>

        </ul>
    </div>
</div>