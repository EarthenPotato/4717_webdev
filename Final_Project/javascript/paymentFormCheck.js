document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('paymentForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting initially
        var invalidFields = [];
        var validations = {
            'cEmail': {
                'required': true,
                'requiredMessage': 'Email is required',
                'pattern': /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                'message': 'Email is invalid'
            },
            'cCountry': {
                'required': true,
                'requiredMessage': 'Country is required',
                'pattern': /^[A-Za-z\s]{3,}$/,
                'message': 'Country should only contain letters and spaces.'
            },
            'cName': {
                'required': true,
                'requiredMessage': 'Name is required',
                'pattern': /^[A-Za-z\s]{3,}$/,
                'message': 'Name should only contain letters and spaces.'
            },
            'cAddress': {
                'required': true,
                'requiredMessage': 'Address is required',
                'pattern': /^[A-Za-z0-9\s]{3,}$/,
                'message': 'Address should only contain letters, numbers and spaces.'
            },
            'cPostalCode': {
                'required': true,
                'requiredMessage': 'Postal code is required',
                'pattern': /^\d{6}$/,
                'message': 'Postal code should be 6 digits long.'
            },
            'cPhone': {
                'required': true,
                'requiredMessage': 'Phone number is required',
                'pattern': /^\d{8}$/,
                'message': 'Phone number must be 8 digits.'
            }
            // Add more fields if necessary
        };

        // Function to check the field and collect error messages
        function checkField(fieldName, config) {
            var field = form.elements[fieldName];
            if (!field.value) {
                // Use the custom requiredMessage instead of a generic message
                invalidFields.push(config.requiredMessage);
                field.classList.add('highlight');
            } else if (config.pattern && !config.pattern.test(field.value)) {
                invalidFields.push(config.message);
                field.classList.add('highlight');
            } else {
                field.classList.remove('highlight');
            }
        }
        // Loop over each field and validate
        for (var fieldName in validations) {
            if (validations.hasOwnProperty(fieldName)) {
                checkField(fieldName, validations[fieldName]);
            }
        }

        // If there are invalid fields, highlight them and show a message
        if (invalidFields.length > 0) {
            alert("Please correct the following errors:\n" + invalidFields.join("\n"));
        } else {
            // If everything is fine, submit the form
            form.submit();
        }
    });
});