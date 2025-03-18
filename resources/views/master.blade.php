<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <base href="{{ asset('') }}"></base>

<!-- Google Fonts -->
<link href="http://fonts.googleapis.com/css?family=Dosis:300,400" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">

<!-- Bootstrap -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('source/assets/dest/css/font-awesome.min.css') }}">

<!-- Colorbox -->
<link rel="stylesheet" href="{{ asset('source/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
<!-- Revolution Slider -->
<link rel="stylesheet" href="{{ asset('source/source/assets/dest/rs-plugin/css/settings.css') }}">
<link rel="stylesheet" href="{{ asset('source/source/assets/dest/rs-plugin/css/responsive.css') }}">

<!-- Custom Styles -->
<link rel="stylesheet" href="{{ asset('source/assets/dest/css/style.css') }}" title="style">
<link rel="stylesheet" href="{{ asset('source/assets/dest/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('source/assets/dest/css/huong-style.css') }}" title="style">
</head>
<body>
    @include('page.header')
    @yield('content')
    @include('page.footer')
	@include('script')
</body>
</html>