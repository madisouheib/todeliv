<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Send Express Espace </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Delivery " />
    <meta name="keywords" content="send , express ">
    <meta name="author" content="Codedthemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('dash/assets/images/logoexp.png') }} " type="image/x-icon">
    <!-- fontawesome icon -->
  <link rel="stylesheet"  href="{{ mix('css/app.css') }}" >


</head>

    <body  >


@include('dashboard.core.header')

<div id="core" >



            @yield('content-admin')

        </div>
  @include('dashboard.core.footer')
 



      <script src="{{ mix('js/app.js') }}"></script>
      <script src="{{ mix('js/admin.js') }}"></script>
    




</body>
</html>
