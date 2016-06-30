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
                                {{ Auth::guard('organization')->user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu list-group">
                                <li><a href="{{ route('organization.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('organization.account') }}">Profile</a></li>
                                <li><a href="#">Profile</a>My Events</li>
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