@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
	<section class="row userDashboardPictureSection">
		<div class="col-md-4 dashboard-creativeSpace round">
			<header><h3>Creative Space</h3></header>
		</div>
		<div class="col-md-4 dashboard-userImage round">
			<header><h3>
				@if (Storage::disk('local')->has('volunteer-' . $user->firstName . '-' . $user->id . '.jpg'))
			        <section class="row">
			            <div class="col-md-4 col-md-offset-2">
			                <img class="img-circle img-responsive" width="300" height="300" src="{{ route('volunteer.account.image', ['filename' => 'volunteer-' . $user->firstName . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
			            </div>
			        </section>
	    		@else
	    			<section class="row">
			            <div class="col-md-4">
			                <p>Image not found!</p>
			            </div>
			        </section>
	    		@endif
			</h3></header>
				Name: {{ $user->firstName }} {{ $user->lastName }} <br>
				Area: {{ $user->zipCode }}
		</div>
		<div class="col-md-1"> </div>
		<div class="col-md-2 dashboard-trackedHours round">
			<div class="row">
				<header><h3>Hours tracked goes here</h3></header>
				<div class="circle circle-border">
					<div class="circle-inner">
						<div class="score-text">
					    	Hours: {{  $total_hours }}
					 	</div>
					</div>
				</div>
			</div>
			<div class="row"><header><h3>Badges goes here</h3></header></div>
		</div>
		<div class="col-md-1"> </div>
	</section>


	<section class="row userDashboardInfoSection">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<header><h3>About Me</h3></header>
					<td class="text-left">
						{{ $user->about }}
					</td>
				</div>

				<div class="col-md-6">
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
	</section>

@endsection

