@extends('layouts.app')

<!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/allstyle.css">

@section('title')
    test
@endsection




@section('content')

<section class="content">
	<header class="bird-box">
		<div class="logo">Carrot-Path</div>
		<div class="fore-bird"></div>
	</header>>
	
	<article>
		<h1>Volunteering</h1>
		<hr>
		<p>lorem isum</p>
	</article>
	<div style="height: 2000px"> </div>
</section>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(window).scroll(function() {
	var wScroll = $(this).scrollTop();

	$('.logo').css({
		'transform' : 'translate(0px, '+ wScroll/2.4 +'%)'
	});

	$('.fore-bird').css({
		'transform' : 'translate(0px, -'+ wScroll/20 +'%)'
	});


});
</script>

