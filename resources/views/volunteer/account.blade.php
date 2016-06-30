@extends('layouts.app')

@section('title')
    Account
@endsection

@section('content')
	<div class="row">
        <div class="col-md-offset-4">
            @include('includes.errors')
        </div>
    </div>

	    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('volunteer.account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" class="form-control" value="{{ $user->firstName }}" id="firstName">
                    <br>

                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" class="form-control" value="{{ $user->lastName }}" id="lastName">
                    <br>

                    <label for="zipCode">Zip Code</label>
                    <input type="text" name="zipCode" class="form-control" value="{{ $user->zipCode }}" id="zipCode">
                    <br>

                    <label for="about">About</label>
                    <textarea class="form-control" name="about" id="about" rows="5">{{ $user->about }}</textarea>
                    <br>

                    <div class="form-group">
                        <hr>
                        <label>Select Volunteer Interests</label><br>
                        <ul class="userDashboardCheckbox">
                            @foreach ($interests as $interest)
                                @if (in_array($interest->id, $interestsIds))
                             <li><input type="checkbox" name="interests[]" checked="checked" value={{ $interest->id }}> {{ $interest->name }}</li>
                                @else
                                <li><input type="checkbox" name="interests[]" value={{ $interest->id }}> {{ $interest->name }}</li>
                                @endif
                            @endforeach
                        </ul>

                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                         <hr>
                        <label for="image">Image (only .jpg)</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    @if (Storage::disk('local')->has($user->firstName . '-' . $user->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img class="img-circle" width="200" height="150" src="{{ route('account.image', ['filename' => $user->firstName . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
            </div>
        </section>
    @endif
@endsection