document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('table');
    const tbody = table.querySelector('tbody');
    
    // Loop through the phpData array and populate the table
    for (const order of phpData) {
        const row = tbody.insertRow();
        
        console.log(order.product, order.quantity);

        // Create productImage based on order.product
        const productImage = document.createElement('img');
        productImage.style.width = '10%';
        
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
        // row.insertCell(3).textContent = `$${(order.quantity * order.price).toFixed(2)}`;
    }
});
