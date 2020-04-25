<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.partials.estilos')
</head>

<body class="software-lp">

  <!--Main Navigation-->
  <header>
 @include('frontend.partials.header')
  </header>
  <!--Main Navigation-->

  <!--Main content-->
  <main>
    @yield('content')
  </main>
  <!--Main content-->

  <!--Footer-->
  @include('frontend.partials.footer')
  <!--/.Footer-->

  <!-- SCRIPTS -->
  @include('frontend.partials.script')
</body>

</html>
