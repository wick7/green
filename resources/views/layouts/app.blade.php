<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>@yield('title')</title>

	    <!-- Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Jaldi|Shrikhand" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Heebo:100" rel="stylesheet">

	    <!-- CSS -->
	    <link href="{{ URL::to('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
	    @yield('head')
	</head>

	<body id="app-layout">
		<div class="main-body">
			@include('includes.messages')
			@include('includes.navBar')
		    @yield('content')
	    </div>

		<script src="{{ URL::to('js/jquery.min.js') }}"></script>
		 @yield('script')
	</body>
</html>
