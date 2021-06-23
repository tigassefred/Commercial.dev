<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" media="print">
    <link rel="stylesheet" href="{{asset('assets/font/css/all.min.css')}}">
    <title>Impression</title>
    @stack('custum-styles')
</head>
<body>
   



    @yield('content')
    

    @stack('custom-scripts')
</body>
</html>