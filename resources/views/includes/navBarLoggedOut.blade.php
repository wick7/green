<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
            	<img src="/images/logo.png" width="125" height="25" class="img-responsive" alt="Responsive image">
            </a>
        </div>
         
         <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<span class="caret"></span></a>
                	<div class="dropdown-menu loginMenu">
	                    <form action="{{ route('signin') }}" method="post" class="navlogin">
		                	<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="test-function">
			                    <!-- <label for="email">Enter Email</label> -->
			                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ Request::old('email') }}">
			                </div>
			                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			                    <!-- <label for="password">Enter password</label> -->
			                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="{{ Request::old('password') }}">
			                </div>
			                <button type="submit" class="btn btn-primary">Login</button>
			                <!--<a href="redirect">FB Login</a>-->
			                <input type="hidden" name="_token" value="{{ Session::token() }}">
			            </form>

	                	<form>
	                		<li role="separator" class="divider"></li>
	                		<a href="#collpaseRegister" class="navlogin" role="button" data-toggle="collapse">New User/Register?</a>
	                	</form>

	                	<form action="{{ route('signup') }}" method="post" class="form collapse navlogin" id="collpaseRegister">
			                @include('includes.errors')
			                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			                    <!--<label for="email">Enter Email</label>-->
			                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email"value="{{ Request::old('email') }}">
			                </div>
			                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
			                    <!--<label for="first_name">Enter First Name</label>-->
			                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name"value="{{ Request::old('first_name') }}">
			                </div>
			                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			                    <!--<label for="password">Enter Password</label>-->
			                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="{{ Request::old('password') }}">
			                </div>
			                <button type="submit" class="btn btn-primary">Register</button>
			                <input type="hidden" name="_token" value="{{ Session::token() }}">
                    	</form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
  $('html').click(function (e) {
    if (e.target.id == '.dropdown-toggle') || (e.target.id == '#collpaseRegister') {
        //do something
    } else {
        //do something
        $('.dropdown-menu').slideToggle(400);
    }
  event.stopPropagation();
});

  $('.dropdown-toggle').click(function() {
  $(this).next('.dropdown-menu').slideToggle(400);
});



</script>