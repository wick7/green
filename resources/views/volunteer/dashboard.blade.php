@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section ('headsection')
<link href="{{ URL::to('css/VolDash.css') }}" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css" media="print"/>
 <link href="{{ URL::to('css/Dropzone.css') }}" rel="stylesheet" />

@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4 hours">
			<h3>Your Total Hours!</h3>
						
					 <p>Hours: {{  $user->trackedHours }}</p> 
					 
				</div>
		@if (Storage::disk('local')->has('volunteer-' . $user->firstName . '-' . $user->id . '.jpg'))
		<div class="col-md-8 infoSection">
			            <div class="picture_info">
			                <img id="userImage" class="img-circle img-responsive" width="300" height="300" src="{{ route('volunteer.account.image', ['filename' => 'volunteer-' . $user->firstName . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
			            </div>
			            <div class="text_info">
			            Name: {{ $user->firstName }} {{ $user->lastName }} <br>
						Area: {{ $user->zipCode }}
					</div>
			            </div>
			        
	    		@else
	    			
			            <div class="col-md-8">
			            	
			                <p>Image not found!</p>
			                Name: {{ $user->firstName }} {{ $user->lastName }} <br>
							Area: {{ $user->zipCode }}
			           
			            </div>
			        
			    
	    		@endif
	    	</div>
		</div>
	</div>
	<div class="container">

	<form class="dropzone" mehod="post" action="/{{$user->firstName}}/{{$user->id}}/photos">
		<div class="dz-message" data-dz-message><span>Upload Photos from your event</span></div>
		<input type="hidden" value="{{ Session::token() }}" name="_token">
	</form>
</div>

	
		<div class="container">
		<div class="row"> 
		
			<div class="col-md-12"><h3>Badges goes here</h3></div>
		</div>
	</div>
	</section>
</div>


	
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<header><h3>About Me</h3></header>
					
						<p>{{ $user->about }}</p>
					
				</div>

				<div class="col-md-2">
					<header><h3>Interests</h3></header>
					<td class="text-right">
						<ul class="userDashboardInterests">
							@foreach ($userInterests as $userInterest)
								<li>{{ $userInterest->name }}</li <br>
							@endforeach
						</ul>
					</td>
				</div>
			</div>
		</div>
	
@endsection
@section('script')
<script src="/js/Dropzone.js"></script>
<script>
	Dropzone.options.addPhotosForm = {
		acceptedFiles:'.jpg, .jpeg, .png, .bmp', 
	};

</script>
@endsection
