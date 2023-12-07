<!doctype html>
<html  lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    {!! SEO::generate() !!}
    <link rel="icon" type="image/svg" href="{{ asset('adminassets/img/favicon.png') }}">
    <!-- CSS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
  
    <!-- Stylesheets -->

    <link rel="stylesheet" href="{{ asset('assets/css/base.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <title>{{ env('APP_NAME') }}</title>
    @stack('header')
   
</head>

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
      <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->
  
  
    <main class="main-content  ">
  
        @include('frontend.common.sub_header')
  
        <div class="content-wrapper  js-content-wrapper">
                @yield('content')
                @include('frontend.common.sub_footer')
        </div>
    </main>
  
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
 
    
    @stack('footer')

    <script>
     
    </script>
  </body>

</html>