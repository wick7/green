<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.header')
     <title>@yield('title')</title>
</head>



<body id="app-layout">
    @include('includes.navBar')

    @yield('content')
    
   
    @yield('script')
</body>
</html>
