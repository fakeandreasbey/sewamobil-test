
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/html/modern-light-menu/auth-cover-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 May 2023 20:49:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sewa Mobil by Andreas Budi Ekayana</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('') }}assets/logo/favicon.webp"/>
    <link href="{{ asset('') }}assets/cork/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/cork/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('') }}assets/cork/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> -->
    <link href="{{ asset('') }}assets/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/cork/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/cork/css/dark/plugins.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/src/assets/css/light/authentication/auth-cover.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/authentication/auth-cover.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body>

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
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>
                        
                    <div class="auth-cover">
    
                        <div class="position-relative">
    
                            <img class="mb-5" src="{{ asset('') }}assets/logo/mobil.png" alt="logo hellobaby.id" style="width: 200px;height: 200px;">
                            
                            <h2 class="mt-5 text-white font-weight-bolder px-2">Sewa Mobil</h2>
                        </div>
                        
                    </div>

                </div>



        
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    
                                    <h2>Masuk</h2>
                                    <p>Masukkan email dan kata sandi Anda!</p>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                                <!-- <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                            <label class="form-check-label" for="form-check-default">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-info w-100">Masuk</button>
                                    </div>
                                </div>
                                
                               
                                

                               
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
</form>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('') }}assets/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->


</body>

</html>