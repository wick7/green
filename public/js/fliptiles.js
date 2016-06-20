$(".box").click(function() {
  $('.transform').toggleClass('transform-active');
});

$( "#box3" ).click(function() {
    var clicks = $(this).data('clicks');
  if (!clicks) {
  $("#merchant1").hide(1000);  
  $("#merchant2").show(1000);
    } else {
  $("#merchant2").hide(1000);  
  $("#merchant1").show(1000);
  }
  $(this).data("clicks", !clicks);
});

$( "#box2" ).click(function() {
    var clicks = $(this).data('clicks');
  if (!clicks) {
  $("#organization1").hide(1000);  
  $("#organization2").show(1000);
    } else {
  $("#organization2").hide(1000);  
  $("#organization1").show(1000);
  }
  $(this).data("clicks", !clicks);
});

$( "#box1" ).click(function() {
    var clicks = $(this).data('clicks');
  if (!clicks) {
  $("#volunteer1").hide(1000);  
  $("#volunteer2").show(1000);
    } else {
  $("#volunteer2").hide(1000);  
  $("#volunteer1").show(1000);
  }
  $(this).data("clicks", !clicks);
});