document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.querySelector('#orderTable tbody');

    phpData.forEach(order => {
        const row = tableBody.insertRow();

        // Insert ID
        row.insertCell(0).textContent = order.ID;
        
        // Insert Customer Name
        row.insertCell(1).textContent = order.customername;

        // Products cell
        const productsCell = row.insertCell(2);
        let productsText = ''; // Initialize an empty string to hold the product details

        // Product names are placeholders here, replace 'Product A', 'Product C', 'Product T' 
        // with the actual names of the products corresponding to 'AQ', 'CQ', 'TQ'
        const productNames = {
          'AQ1': 'Product A1',
          'AQ2': 'Product A2',
          'AQ3': 'Product A3',
          'CQ1': 'Product C1',
          'CQ2': 'Product C2',
          'CQ3': 'Product C3',
          'TQ1': 'Product T1',
          'TQ2': 'Product T2',
          'TQ3': 'Product T3'
        };

        for (const [key, value] of Object.entries(order)) {
          if (productNames[key] && value > 0) {
            productsText += `${productNames[key]} - ${value}, `;
          }
        }

        // Remove the trailing comma and space
        productsText = productsText.replace(/, $/, '');

        // Set the text content of the products cell to the formatted products text
        productsCell.textContent = productsText;

        // Status dropdown cell
        
        const statusCell = row.insertCell(3);
        const statusSelect = document.createElement('select');
        statusSelect.className = 'status-dropdown';
        ['Pending', 'Processing', 'Shipped', 'Delivered'].forEach(status => {
            const option = document.createElement('option');
            option.value = status;
            option.textContent = status;
            statusSelect.appendChild(option);
        });
        statusCell.appendChild(statusSelect);

        // Email button cell
        const emailCell = row.insertCell(4);
        const emailButton = document.createElement('button');
        emailButton.textContent = 'Send Email';
        emailButton.addEventListener('click', function() {
            // Placeholder for email sending logic
            console.log(`Email notification for order ID: ${order.ID}`);
        });
        emailCell.appendChild(emailButton);
    });
});
