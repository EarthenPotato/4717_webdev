// Script 2.3 - login.js

// Function called when the form is submitted.
// Function validates the form data and returns a Boolean value.
function validateForm() {
    'use strict';
    
    // Get references to the form elements:
    var email = document.getElementById('email');
    var password = document.getElementById('password');

    var emailPattern =/^[a-zA-Z0-9.-]+@([a-zA-Z0-9]+\.){1,3}[a-zA-Z]{2,3}$/;
    var namePattern = /^[a-zA-Z0-9\s]$/;

    // Validate email using the regular expression:
    if (!emailPattern.test(email.value)) {
        alert('Please enter a valid email address!');
        return false;
    }

    if (!namePattern.test(nametext.value)) {
        alert('Please enter a valid Name!');
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