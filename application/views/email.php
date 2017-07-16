<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email Tester | Techease</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/materialize.css">
</head>
<body>
	
	<div class="row">
		<div class="parallax-container valign-wrapper">
			<div class="container">
				<div class="row">
					<div class="white-text card-panel purple darken-2">
						<h4 class="center-align white-text valign thin-text">Email Template Tester</h4>
					</div>
				</div>
			</div>
			<div class="parallax">
				<img src="<?php echo base_url();?>assets/images/6.jpg" alt="">
			</div>
		</div>
	</div>
	<!-- Jquery Script -->
	<div class="row">
		<div class="container">
			<div class="card-panel">
				<form id="sendEmail">
					<div class="row">
						<div class="input-field col s12">
							<input id="to" type="email" name="to" class="validate">
							<label for="to" data-error="wrong" data-success="right">To</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="subject" type="text" name="subject">
							<label for="text" data-error="wrong" data-success="right">Subject</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="template" name="template" class="materialize-textarea"></textarea>
							<label for="textarea1">Email Template</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light right" id="sendformdata" type="button">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="page-footer purple darken-3">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Tech Ease Solutions</h5>
					<p class="grey-text text-lighten-4" style="text-transform: lowercase;">WE ARE A BUNCH OF EXTREMELY CHOOSY COOKIES. HOWEVER, OUR PHILOSOPHY IS VERY SIMPLE. WE MAINTAIN THE SAME QUALITY OF OUR SERVICES AND PRODUCTS AS WE WOULD EXPECT FROM OUR IDEAL SERVICE PROVIDER.</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Address</h5>
					<ul>
						<li>Office 409 Shiekh Yaseen Tower Arbab Road Stop University Road Peshawar KP Pakistan</li>
						<li>+92-91-5700341</li>
						<li>info@techeasesol.com</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2016 Copyright Tech Ease Solutions
			</div>
		</div>
	</footer>
	<!-- Jquery Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>assets/js/materialize.js"></script>
	<script>
		$(document).ready(function(){
			$('.parallax').parallax();
		});
	    // Textarea Resize
	    $('#textarea1').trigger('autoresize');
  		// Ajax Call
  		$('#sendformdata').click(function() {
  			/* Act on the event */
  			$(this).attr('disabled',true);
	  		var to 		 = $("#to").val();
	  		var subject  = $("#subject").val();
	  		var template = JSON.stringify($("#template").val());
	  		$.ajax({
	  			url: '<?php echo base_url();?>Email/Send',
	  			type: 'POST',
	  			data: {to:to,subject:subject,template,template},
	  		})
	  		.done(function(res) {
	  			if (res == 1) {
	  				Materialize.toast('Email is Sent', 4000);	
  					$(this).removeAttr('disabled');
	  			}
	  			else
	  			{
	  				Materialize.toast('Got Errors While Sending Email!', 4000);
  					$(this).removeAttr('disabled');
	  			}
	  		});
  		});
  		
  	</script>
  </body>
  </html>