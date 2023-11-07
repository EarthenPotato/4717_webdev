document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('paymentForm');
    var emailInput = document.getElementById('emailInput');

    // Check the email field for a valid email when it loses focus
    emailInput.addEventListener('blur', function() {
        if (emailInput.value && !emailInput.validity.valid) {
            emailInput.setCustomValidity('This is not a valid Email Address');
        } else {
            emailInput.setCustomValidity('');
        }
        emailInput.reportValidity();
    });

    // Validate the form when submitting
    form.addEventListener('submit', function(event) {
        // Check if the email field is empty
        if (!emailInput.value) {
            emailInput.setCustomValidity('Email is required.');
            emailInput.reportValidity();
            event.preventDefault();
            return;
        } 

        // Clear any previously set custom messages
        emailInput.setCustomValidity('');

        // Check for the validity of the entire form here if needed
        // (you would need to set custom validity messages for other inputs as appropriate)
    });
});
