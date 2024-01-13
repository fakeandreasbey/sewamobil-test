<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | SIMRS by AndreDEV</title>
    <link rel="icon" type="image/x-icon" href="https://designreset.com/cork/html/src/assets/img/favicon.ico"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('') }}assets/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/cork/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/cork/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    @stack('css')
    <link href="{{ asset('') }}assets/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/plugins/src/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->

 
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/assets/css/light/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/assets/css/dark/elements/alert.css">
    <link rel="stylesheet" href="{{ asset('') }}lib/chosen/docsupport/prism.css">
    <link rel="stylesheet" href="{{ asset('') }}lib/chosen/chosen.css"> -->


    <script language="javascript">
            function getkey(e)
            {
            if (window.event)
                return window.event.keyCode;
            else if (e)
                return e.which;
            else
                return null;
            }
            function angkadanhuruf(e, goods, field)
            {
            var angka, karakterangka;
            angka = getkey(e);
            if (angka == null) return true;

            karakterangka = String.fromCharCode(angka);
            karakterangka = karakterangka.toLowerCase();
            goods = goods.toLowerCase();

            // check goodkeys
            if (goods.indexOf(karakterangka) != -1)
                return true;
            // control angka
            if ( angka==null || angka==0 || angka==8 || angka==9 || angka==27 )
                return true;

            if (angka == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++)
                    if (field == field.form.elements[i])
                        break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;
                };
            // else return false
            return false;
            }
    </script>
    
    <!-- END PAGE LEVEL STYLES -->
</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <!-- <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div> -->
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('layouts.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>



        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

        @include('layouts.menu')

        </div>
        <!--  END SIDEBAR  -->





        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            
                    
            @yield('content')

                  
            






            
            <!--  BEGIN FOOTER  -->
            @include('layouts.footer')
            <!--  END FOOTER  -->



        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->



    <!-- BEGIN MODAL LOGOUT -->
    <div id="rotateleftModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                        <p class="modal-text">Apakah anda ingin keluar dan mengakhiri sesi?</p>
                </div>
                <div class="modal-footer md-button">
                    <a class="btn btn-light-dark" data-bs-dismiss="modal">Batal</a>
                    <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    <a href="?open=Logout" class="btn btn-primary">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL LOGOUT -->



    

 

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @stack('js')
    <!-- END GLOBAL MANDATORY SCRIPTS -->





    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>