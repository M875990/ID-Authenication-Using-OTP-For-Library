function fetchContactNumber(StuID) {
    // Send an AJAX request to the PHP script to fetch the contact number for the given student ID
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Call the function to send the OTP to the contact number
          sendOTP(xhr.responseText);
        } else {
          console.error('Error fetching contact number');
        }
      }
    };
    xhr.open('GET', 'fetch_contact_number.php?stuid=' + StuID);
    xhr.send();
  }
  
  function sendOTP(contactNumber) {
    // Send the OTP to the contact number via a third-party API or service
    // Example using Twilio API
    const accountSid = 'AC1f74fbf9485e80e91c4ffb1eb689e237';
    const authToken = '98c8898d064c471a86e4c6990808da06';
    const client = require('twilio')(accountSid, authToken);
    
    client.verify.services.create()
      .then(service => {
        return client.verify.services(service.sid)
          .verifications
          .create({to: contactNumber, channel: 'sms'});
      })
      .then(verification => console.log(verification.sid))
      .catch(error => console.log(error));
  }
  