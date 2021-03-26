var x = setInterval(function() {
		var now = new Date().getTime();
		var countDownDate = new Date("<?php echo date('m') ?> <?php echo date('d') ?>, <?php echo date('Y') ?> <?php echo $set_h ?>:<?php echo $set_m ?>:0").getTime();
  // Get today's date and time
  // Find the distance between now and the count down date
  distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById('demo').innerHTML ="Còn lại : "+ minutes + " phút " + seconds + " giây ";
  // If the count down is over, write some text 
  if (distance < 0) {
  	clearInterval(x);
  	window.location='print_results.php';
  }
},100);