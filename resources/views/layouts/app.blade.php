<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.header')
     <title>@yield('title')</title>
</head>



<body id="app-layout">
	
	@include('includes.navBar')
	
	<div class="main-body">
		@include('includes.messages')
	    @yield('content')
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/dropdown.js"></script>

    @yield('script')
</body>
</html>
