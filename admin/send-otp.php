<?php

// Retrieve mobile number and OTP from JSON payload
$data = json_decode(file_get_contents("php://input"), true);
$mobile = $data["7483297683"];
$otp = $data["otp"];

// Send OTP to mobile number (replace with your own OTP sending logic)
if ($mobile == "7483297683") { // Replace with your own mobile number validation logic
    echo "OK";
} else {
    echo "Error sending OTP";
}

?>
