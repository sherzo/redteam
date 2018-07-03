<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
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
    <!-- ClockPicker -->
    <link href="{{ asset('assets/css/clock/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <!-- ColorPicker -->
    <link href="{{ asset('assets/css/admin/colorpicker/spectrum.css') }}" rel="stylesheet">
    <!-- Main style -->
    <link href="{{ asset('assets/css/admin/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin/main_responsive.css') }}" rel="stylesheet">
    
   {{-- Input file --}}
   <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet"> 
   @yield('css')
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
                </div>

                {{-- SIDEBAR MENU --}}
                <div class="collapse navbar-collapse collapseMenuUser menuAdmin" 
                id="app-navbar-collapse">
                    
                    @include('back-end.partials.sidebar')
                   
                </div>
                 {{-- END SIDEBAR MENU --}}
            </div>
        </nav>
        
        @yield('content')
    
    </div>
    
    {{-- SCRIPTS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/menu/classie.js') }}"></script>
    <script src="{{ asset('assets/js/menu/gnmenu.js') }}" ></script>
    <script src="{{ asset('assets/js/semantic.js') }}" ></script>
    <script src="http://127.0.0.1:6800/socket.io/socket.io.js"></script>
    <script>    

    const socket = io.connect('http://127.0.0.1:6800',{
        'reconnection': true,
        'reconnectionDelay': 500,
        'reconnectionAttempts': 10
    })

    @auth
        socket.emit('conect-socket', { id: '{{ Auth::user()->id }}' })
    @endauth

    function disconnect(event) {
        event.preventDefault();
        socket.emit('desconectar', { id: '{{ Auth::user()->id }}'} )
        document.getElementById('logout-form').submit();
    }

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('.dropdownSemantic')
        .dropdown({
            transition: 'drop'
        });

    </script>
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
    <script src="{{ asset('assets/js/clock/bootstrap-clockpicker.min.js') }}" type="text/javascript" ></script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker()
            .find('input').change(function() {
            console.log(this.value);
        });

        var input = $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });

        if (/mobile/i.test(navigator.userAgent)) {
            $('input').prop('readOnly', true);
        }
    </script>
    {{--
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript" ></script>
    End ClockPicker 
    --}}
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/datePicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/admin/colorpicker/spectrum.js') }}"></script>
    
    {{--
    
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
    --}}
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
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
    <script src="{{ asset('assets/js/admin/main.js') }}" type="text/javascript" ></script>
    @yield('js')
</body>
</html>
