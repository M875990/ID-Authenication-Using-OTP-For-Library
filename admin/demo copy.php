<button onclick="sendOTP()">Send OTP</button>
<?php

function sendOTP() {
	// Get the stuid of the user
	var stuid = "4hg19cs018"; // Replace with the actual stuid
  
	// Make an AJAX call to a PHP script to fetch the contact number
	$.ajax({
	  url: "contact.php",
	  type: "POST",
	  data: { stuid: stuid },
	  success: function(ContactNumber) {
		// Send OTP to the contact number using the 2factor API
		var otp = Math.floor(100000 + Math.random() * 900000);
		$.ajax({
		  url: "http://2factor.in/API/V1/43d8c400-e996-11ed-addf-0200cd936042/SMS/" + ContactNumber + "7483297683" + otp,
		  type: "GET",
		  success: function(response) {
			// Store the OTP and contact number in the database
			$.ajax({
			  url: "store.php",
			  type: "POST",
			  data: { stuid: stuid, ContactNumber: ContactNumber, otp: otp },
			  success: function() {
				alert("OTP sent to " + ContactNumber);
			  }
			});
		  }
		});
	  }
	});
  }
  
?>