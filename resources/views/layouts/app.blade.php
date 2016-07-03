<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.header')
     <title>@yield('title')</title>
</head>



<body id="app-layout">
	
	@include('includes.navBar')
	
	<div class="main-body container-fluid">
	    @yield('content')
    </div>

	<div class="container"> 
		@include('includes.footer')
	</div>

    @yield('script')
</body>
</html>
