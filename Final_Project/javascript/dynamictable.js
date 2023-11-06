document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('table');
    const tbody = table.querySelector('tbody');
    
    // Access the data from phpData
    const product = phpData.product;
    const quantity = phpData.quantity;

    // Initialize an array to store the data
    const orders = [];

    // Push the data into the orders array
    orders.push({ product, quantity });

    // Loop through the orders and populate the table
    for (const order of orders) {
        const row = tbody.insertRow();
        
        // Create productImage based on order.product
        const productImage = document.createElement('img');
        if (order.product.includes("AQ")) {
            productImage.src = "pictures/headphone.jpg";
        } else if (order.product.includes("CQ")) {
            productImage.src = "pictures/computer.jpg";
        } else if (order.product.includes("TQ")) {
            productImage.src = "pictures/techacc.jpg";
        }

        // Populate the table cells
        row.insertCell(0).appendChild(productImage);
        row.insertCell(1).textContent = order.product;
        row.insertCell(2).textContent = order.quantity;
        // You will need to provide a price or modify this part accordingly
        row.insertCell(3).textContent = `$${(order.quantity * order.price).toFixed(2)}`;
    }
});
