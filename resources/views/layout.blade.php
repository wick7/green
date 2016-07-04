<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Calendar Demo</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->
    <link ref= "stylesheet" href="css/jquery.datetimepicker">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css" media="print"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.css">
     <link rel="stylesheet" href="/css/bootstrap-datetimepicker.css">


</head>

<body>





<nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">


                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="/images/logo.png" width="125" height="25" class="img-responsive" alt="Responsive image">
                </a>
            </div>


            <!-- Right Side Of Navbar -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if(Auth::guard('volunteer')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('volunteer')->user()->firstName }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu list-group">
                                <li><a href="{{ route('volunteer.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('volunteer.account') }}">Profile</a></li>
                                <li><a href="#">My Events</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('volunteer.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>


                        </li>
                    @elseif(Auth::guard('organization')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('organization')->user()->organization }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu list-group">
                                <li><a href="{{ route('organization.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('organization.account') }}">Profile</a></li>
                                <li><a href="{{ url('/calendar_events/create') }}">Add an Event</a></li>
                                <li><a href="{{ route('calendar_events.index') }}">My Events</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('organization.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a id='Organization' href="{{ url('/organization/login') }}">Organizations</a></li>
                        <li><a id='Volunteer' href="{{ url('/volunteer/login') }}">Volunteers</a></li>
                        <li><a id='RegOrg' href="{{ url('/organization/register') }}">Register Organizations</a></li>
                        <li><a id='RegVol' href="{{ url('/volunteer/register') }}">Register Volunteers</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>








<div class="container">
    <div class="row">
        <div class="col-md-12">@yield('content')</div>
    </div>
</div><!-- /.container -->





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

@yield('scripts')

</body>
</html>
