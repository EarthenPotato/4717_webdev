// Script 2.3 - login.js

// Function called when the form is submitted.
// Function validates the form data and returns a Boolean value.
function validateForm() {
    'use strict';
    
    // Get references to the form elements:
    var email = document.getElementById('email');
    var password = document.getElementById('password');

    var emailPattern = /^[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}(\.[a-zA-Z]{2,3})?$/;


    // Validate email using the regular expression:
    if (!emailPattern.test(email.value)) {
        alert('Please enter a valid email address!');
        return false;
    }

    // Validate password:
    if (email.value.length === 0 || password.value.length === 0) {
        alert('Please complete the form!');
        return false;
    }

    // If both email and password are valid, return true:
    return true;
    
} // End of validateForm() function.

// Function called when the window has been loaded.
// Function needs to add an event listener to the form.
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