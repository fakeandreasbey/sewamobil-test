
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Sewa Mobil</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('') }}assets/logo/mobil.png"/>
    <link href="{{ asset('') }}assets/cork/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/cork/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('') }}assets/cork/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ asset('') }}assets/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/cork/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/cork/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    
    <link href="{{ asset('') }}assets/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/plugins/src/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->   
    
    <link rel="stylesheet" href="{{ asset('') }}lib/fontawesome/css/fontawesome.min.css" />  
    <link rel="stylesheet" href="{{ asset('') }}lib/fontawesome/css/all.min.css" />  

    <!-- <link href="{{ asset('') }}assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" /> -->

    <!-- <link rel="stylesheet" href="{{ asset('') }}assets/src/plugins/src/sweetalerts2/sweetalerts2.css"> -->
    
    <style>
    body {
        font-family: 'Source Sans 3', sans-serif;
    /* Fallback font jika Roboto tidak tersedia */
    i[class^="fa-"] {
        vertical-align: middle; /* Menengahkan ikon secara vertikal */
        margin-right: 5px; /* Memberi jarak antara ikon dan teks */
    }
    }


    </style>
        
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    @stack('css')   
    <!--  END CUSTOM STYLE FILE  -->
    <!-- END GLOBAL MANDATORY STYLES -->



    <style>
        body.dark .layout-px-spacing, .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
    </style>



    
</head>
<body class="layout-boxed">

    <!-- BEGIN LOADER -->
    <!--
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center">
                </div>
            </div>
        </div>
    </div>
    -->
    <!--  END LOADER -->

    

        
            
        <!--  BEGIN NAVBAR  -->
        <div class="header-container container-xxl">
            @include('layouts.navbar')
        </div>
        <!--  END NAVBAR  -->
            
                    
        
        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container " id="container">
            
            <!--  BEGIN LOADER  -->

            <div class="overlay"></div>
            <div class="cs-overlay"></div>
            <div class="search-overlay"></div>           

            <!--  END LOADER  -->

             

                
            <!--  BEGIN SIDEBAR  -->
            <div class="sidebar-wrapper sidebar-theme">
                @include('layouts.menu')
            </div>
            <!--  END SIDEBAR  --> 
                
                              
            
            
            
            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content ">

         
                    @yield('content')
                
                <!--  BEGIN FOOTER  -->
                    @include('layouts.footer')              
                <!--  END FOOTER  -->
                
            </div>
            <!--  END CONTENT AREA  -->

        </div>
        <!--  END MAIN CONTAINER  -->
        
    

        <!-- BEGIN MODAL LOGOUT -->
        <form  class="mt-0" method="POST" action="{{ route('logout') }}">
        @csrf
        <div id="rotateleftModal" class="modal" role="dialog">
        <!-- <div id="rotateleftModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog"> -->

            <div class="modal-dialog modal-dialog-centered">
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
                        <a data-bs-dismiss="modal"class="btn btn-dark">Batal</a>
                        <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- END MODAL LOGOUT -->



        <!-- BEGIN GLOBAL MANDATORY STYLES -->
            @stack('js')

                <script type="text/javascript">
                // Restricts input for the given textbox to the given inputFilter.
                function setInputFilter(textbox, inputFilter, errMsg) {
                ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
                    textbox.addEventListener(event, function(e) {
                    if (inputFilter(this.value)) {
                        // Accepted value
                        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
                        this.classList.remove("input-error");
                        this.setCustomValidity("");
                        }
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        // Rejected value - restore the previous one
                        this.classList.add("input-error");
                        this.setCustomValidity(errMsg);
                        this.reportValidity();
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        // Rejected value - nothing to restore
                        this.value = "";
                    }
                    });
                });
                }
                </script>








            <!-- <script src="{{ asset('') }}assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script> -->
        <!-- END GLOBAL MANDATORY STYLES -->

<!-- 
// Install input filters.
setInputFilter(document.getElementById("intTextBox"), function(value) {
  return /^-?\d*$/.test(value); }, "Must be an integer");
setInputFilter(document.getElementById("uintTextBox"), function(value) {
  return /^\d*$/.test(value); }, "Must be an unsigned integer");
setInputFilter(document.getElementById("intLimitTextBox"), function(value) {
  return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500); }, "Must be between 0 and 500");
setInputFilter(document.getElementById("floatTextBox"), function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); }, "Must be a floating (real) number");
setInputFilter(document.getElementById("currencyTextBox"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Must be a currency value");
setInputFilter(document.getElementById("latinTextBox"), function(value) {
  return /^[a-z]*$/i.test(value); }, "Must use alphabetic latin characters");
setInputFilter(document.getElementById("hexTextBox"), function(value) {
  return /^[0-9a-f]*$/i.test(value); }, "Must use hexadecimal characters");
-->
        
        
</body>
</html>