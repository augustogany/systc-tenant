 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Creative Tim">
   <title>SYSTCARV</title>
   <!-- Favicon -->
   <link rel="icon" href="{{asset('account/assets/img/brand/favicon.png')}}" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{asset('account/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
   <link rel="stylesheet" href="{{asset('account/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{asset('account/assets/css/argon.css?v=1.1.0')}}" type="text/css">
 </head>
 
 <body>
<div id="app">
    <!-- Sidenav -->
    @include('account.layouts.partials.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('account.layouts.partials.topnav')
        <!-- Header -->
        <div class="container">
                    @include('layouts.partials.alerts._alerts')
        </div>
        <!-- Header -->
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">New</a>
                            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            {{-- <div class="row">
                
            </div> --}}
            @yield('content')
        </div> 
    </div>
</div>
   
   <!-- Argon Scripts -->
   <!-- Core -->
   
   <script src="{{asset('js/app.js')}}"></script>
   <script src="{{asset('account/assets/vendor/js-cookie/js.cookie.js')}}"></script>
   <script src="{{asset('account/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
   <script src="{{asset('account/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
   <!-- Optional JS -->
   <script src="{{asset('account/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
   <script src="{{asset('account/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
   
   <!-- Argon JS -->
   <script src="{{asset('account/assets/js/argon.js?v=1.1.0')}}"></script>
   
 </body>
 
 </html>