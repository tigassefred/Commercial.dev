<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <title>{{$titre}}</title>
</head>
<body>
    @yield('content')
    
    @livewireScripts()
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>
</html>