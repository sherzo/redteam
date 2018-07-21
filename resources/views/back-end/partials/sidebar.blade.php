<div id="sidebar"> 
    <ul>
        <li id='titleAdmin'><a href="{{ url('admin/home') }}">Administrador</a></li>
        <li>
            <a href="{{ url('admin/board') }}" class=""> Dashboards</a>
        </li>
        <li>
            <a href="{{ url('admin/chats') }}" class="mensageIco">  Mensajes</a>
        </li>
        <li>
            <a href="{{ url('admin/suggestions') }}" class="usgerenIco"> Sugerencias</a>
        </li>
        <li>
            <a href="{{ url('admin/emergencies') }}" class="emergenciasIco"> Emergencias</a>
        </li>
        <li>
            <a href="{{ url('admin/applications') }}" class="permisoIco">  Permisos</a>
        </li>
        <li>
            <a href="{{ url('admin/calendar') }}" class="calendarIco"> Calendario</a>
        </li>
        <li>
            <a href="{{ url('admin/documents') }}" class="documentIco">  Documentos</a>
        </li>
        <li>
            <a href="{{ url('admin/promotions') }}" class="calendarIco"> Promociones</a>
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
            <a href="{{ url('admin/ranking') }}" class="rannkingIco"> Ranking</a>
        </li>
        <li class="2TwoBlow">
            <a href="{{ url('evaluations') }}" class="evalucionIco"> Evaluaciones</a>
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
                <a href="{{ url('admin/home') }}">
                    <img src="{{ asset('assets/images/icons/home.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ url('admin/chats') }}">
                    <img src="{{ asset('assets/images/icons/message.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ url('admin/suggestions') }}">
                    <img src="{{ asset('assets/images/icons/sguerencias.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ url('admin/emergencies') }}">
                    <img src="{{ asset('assets/images/icons/emergencias.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ url('admin/applications') }}">
                    <img src="{{ asset('assets/images/icons/permisos.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ url('calendar') }}">
                    <img src="{{ asset('assets/images/icons/calendar.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ url('admin/documents') }}">
                    <img src="{{ asset('assets/images/icons/documentos.png') }}" class="img- responsive" alt="">
                </a>
            </li>
            <li>
                <a href="{{ url('admin/promotions') }}">
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
                <a href="{{ url('admin/ranking') }}">
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