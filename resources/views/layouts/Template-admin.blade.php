<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Style Menu Desplace  -->
    <link href="{{ asset('assets/css/menu/component.css') }}" rel="stylesheet">
    <!-- Semantic Ui CSS -->
    <link href="{{ asset('assets/css/semantic.css') }}" rel="stylesheet">
    <!-- STYLE FONT AWESOME -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Datepicker Files -->
    <link href="{{ asset('assets/css/datePicker/bootstrap-datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- ColorPicker -->
    <link href="{{ asset('assets/css/admin/colorpicker/spectrum.css') }}" rel="stylesheet">

    <!-- Main style -->
    <link href="{{ asset('assets/css/admin/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin/main_responsive.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="bgUser">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top navbarHome bgAdmins">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
            <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>  -->
            </div>

            <div class="collapse navbar-collapse collapseMenuUser menuAdmin" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <div id="sidebar">
                    <ul>
                        <li id='titleAdmin'><a href="#">Administrador</a></li>
                        <li>
                            <a href="home" class="dashico"> Dashboards</a>
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
                            <a href="usuarios" class="EditUseIco"> Editar Usuarios</a>
                        </li>
                        <li class="2TwoBlow">
                            <a href="addUsers" class="AddUseIco"> Agregar Usuarios</a>
                        </li>
                        <li class="2TwoBlow">
                            <a href="usuarios" class="UseIco"> Usuarios</a>
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
                                <a href="#!">
                                    <img src="{{ asset('assets/images/icons/edit-user.png') }}" class="img- responsive" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="usuarios">
                                    <img src="{{ asset('assets/images/icons/add-user.png') }}" class="img- responsive" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="addUsers">
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

                <!-- Right Side Of Navbar -->
                {{-- <ul class="nav navbar-nav navbar-right navulRIght">
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                      <li><a href="{{ url('/login') }}">Login</a></li>
                      <li><a href="{{ url('/register') }}">Register</a></li>
                  @else
                      <li class="dropdown uSerLogue colorBlackSuave fontMiriamProRegular">
                          <a href="#" class="dropdown-toggle colorBlackSuave" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li>
                                  <a href="{{ url('/logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endif
                </ul> --}}
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<span class="lnvmodal lnvmodal-loader" style="opacity: 0.9;">
      <p>
      <span>Cargando...</span>
      </p>
      <aside role="dialog">
       <div>Loading....</div>
      </aside>
    </span>

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript" ></script>
<script type="text/javascript">
    $('#myModalSolicitudRespuestCorrect').modal('show');
</script>
<script src="{{ asset('assets/js/menu/classie.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/menu/gnmenu.js') }}" type="text/javascript" ></script>

<script>
    new gnMenu( document.getElementById( 'gn-menu' ) );
</script>

<script>
    $(window).bind("beforeunload", function() {
        // return confirm("deseas cerrar la ventana?");
    });
</script>

<!-- Semantic Ui CSS -->
<script src="{{ asset('assets/js/semantic.js') }}" type="text/javascript" ></script>
<script>
    $('.dropdownSemantic')
        .dropdown({
            transition: 'drop'
        });

</script>

<script>
    $('.button')
        .popup({
            inline: true
        });
    $('.dropdownSemantic')
        .dropdown({
            transition: 'drop'
        });
    $('.accordion')
        .accordion({
            selector: {
                trigger: '.title div .fa-angle-down'
            }
        })
    ;

    $('.max.example .ui.fluid.dropdown')
        .dropdown({
            maxSelections: 15
        })
    ;
    $('.dataClicDEsplace .accordion')
        .accordion({
            selector: {
                trigger: '.title .fa-angle-down'
            }
        })
    ;
    $('.rating')
        .rating({
            maxRating: 5,
            disable: false,
        });
    $('.rating')
        .rating('disable')
    ;

    $('.bloqueActionAddNodui .accordion')
        .accordion({
            selector: {
                trigger: '.title'
            }
        })
    ;

</script>


<script src="{{ asset('assets/js/moment.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript" ></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker12').datetimepicker({
            inline: true,
            sideBySide: true
        });
    });
</script>

<script src="{{ asset('assets/js/datePicker/bootstrap-datepicker.js') }}" type="text/javascript" ></script>
<script type="text/javascript">
    $('#sandbox-container .input-daterange').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
</script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
    //<![CDATA[
    $(window).load(function(){
        $(".togleAdmin").click(function() {
            $('#sidebar3').toggleClass('sidebar3Hiden');
            var toggle_el = $(this).data("toggle");
            $(toggle_el).toggleClass("open-sidebar");
            // $('.container.continerWithSite').toggleClass("widthFull");
        });
    });//]]>

</script>

<script src="{{ asset('assets/js/admin/colorpicker/spectrum.js') }}" type="text/javascript" ></script>
<script>
    function printColor(color) {
        var text = "You chose... " + color.toHexString();
        $(".label").text(text);

    }

    $("#showPaletteOnly").spectrum({
        allowEmpty:true,
        showInitial: true,
        showInput: true,
        showPaletteOnly: true,
        change: function(color) {
            printColor(color);
        },
        palette: [
            ["00a89c", "22b473", "d3145a","ea5b3a"],
            ["ffd249", "e0629a", "89d085", "4caad8"],
            ["662d90", "d3145a", "faaf3b", "f05a24"],
            ["d8df21", "39b44a", "c59b6d", "2e3191"],
            ["0071bb", "ec1e79", "c0272d", "f46851"]
        ]
    });
</script>

<script src="{{ asset('assets/js/admin/main.js') }}" type="text/javascript" ></script>
</body>
</html>
