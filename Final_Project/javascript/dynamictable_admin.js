document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.querySelector('#orderTable tbody');
    console.log("DOM fully loaded and parsed");
    console.log("this is phpData", phpData);

    phpData.forEach(order => {
        const row = tableBody.insertRow();

        // Access ID using the property name 'ID'
        const id = order.ID;
        row.insertCell(0).textContent = id;
        console.log("Order ID:", id);

        // Access Customer Name using the property name 'customername'
        const customerName = order.customername;
        row.insertCell(1).textContent = customerName;
        console.log("Customer Name:", customerName);

        // Products and Quantities cell
        const productsCell = row.insertCell(2);
        let productsText = '';

        // Assuming the 'quantities' is an object with product codes as keys and quantities as values
        const quantities = order.quantities;
        
        Object.keys(quantities).forEach(productCode => {
            const quantity = quantities[productCode];
            if (quantity > 0) {
                productsText += `${productCode} - ${quantity}, `;
                
                // Log each product and quantity
                console.log(`${productCode} - ${quantity}`);
            }
        });

        // Log the final products text before setting it in the cell
        console.log("Final Products Text:", productsText);

        // Set the text content of the products cell to the formatted products text
        productsCell.textContent = productsText.replace(/, $/, '');  // Remove trailing comma and space

        // Status dropdown cell
        const statusCell = row.insertCell(3);
        const statusSelect = document.createElement('select');
        ['Pending', 'Processing', 'Shipped', 'Delivered'].forEach(status => {
            const option = document.createElement('option');
            option.value = status;
            option.textContent = status;
            statusSelect.appendChild(option);
        });

        // Log the status options added
        console.log("Status options added for ID:", id);

        statusCell.appendChild(statusSelect);

        // Email button cell
        const emailCell = row.insertCell(4);
        const emailButton = document.createElement('button');
        emailButton.textContent = 'Send Email';
        emailButton.addEventListener('click', function() {
            // Log the email button click
            console.log(`Email button clicked for order ID: ${id}`);
            
            // Placeholder for email sending logic
            // You can add a debugger here to pause when email button is clicked
            debugger;
        });
        emailCell.appendChild(emailButton);
    });
});
