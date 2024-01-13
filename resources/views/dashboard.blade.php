@extends('layouts.layout')

@section('title')
Beranda
@endsection

@section('content')


@push('css')

    <link href="{{ asset('') }}assets/cork/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/cork/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('') }}assets/cork/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('') }}assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('') }}assets/src/assets/css/light/components/accordions.css" rel="stylesheet" type="text/css" /> -->

    <link href="{{ asset('') }}assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/components/accordions.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/assets/css/light/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/assets/css/dark/elements/alert.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@endpush



            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


    
                    <div class="row layout-top-spacing">

                        <div class="col-12">
                            <div class="alert alert-arrow-right alert-icon-right alert-light-info alert-dismissible fade show mb-4" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                <strong>Selamat </strong>

                            </div>
                        </div>

    


                      

                    
                    </div>

                </div>

            </div>

        


@endsection




@push('js')
    <script src="{{ asset('') }}assets/cork/app.js"></script>
    <script src="{{ asset('') }}assets/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/waves/waves.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/global/vendors.min.js"></script>
    <script src="{{ asset('') }}assets/src/assets/js/custom.js"></script>

  

@endpush



