// Script 2.3 - login.js

// Function called when the form is submitted.
// Function validates the form data and returns a Boolean value.
function validateForm() {
    'use strict';
    
    // Get references to the form elements:
    var email = document.getElementById('email');

    var emailPattern =/^[a-zA-Z0-9.-]+@([a-zA-Z0-9]+\.){1,3}[a-zA-Z]{2,3}$/;
    var namePattern = /^[a-zA-Z\s]+$/;

    //Validations
    
    if (!namePattern.test(nametext.value)) {
        alert('Please enter a valid Name! No numbers');
        return false;
    }

    if (!emailPattern.test(email.value)) {
        alert('Please enter a valid email address!');
        return false;
    }

    return true; 
} 

function setMinDateToTomorrow() {
    const today = new Date();
    
    // Add one day to get tomorrow
    const tomorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1);
    
    // Format the date in YYYY-MM-DD format
    const formattedDate = tomorrow.toISOString().split('T')[0];

    // Set the min attribute of the input element to restrict past dates
    document.getElementById("startDate").min = formattedDate;
}

function init() {
    'use strict';
    
    // Confirm that document.getElementById() can be used:
    if (document && document.getElementById) {
        var loginForm = document.getElementById('loginForm');
        loginForm.onsubmit = validateForm;
    }

} // End of init() function.

// Assign an event listener to the window's load event:
window.onload = init;