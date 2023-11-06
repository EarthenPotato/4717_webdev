document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('#orderTable tbody');

    // Assuming phpData is defined in the global scope from your PHP echo statement
    for (const order of phpData) {
        const row = table.insertRow();

        // Assuming you have an order ID to display
        row.insertCell(0).textContent = order.id;

        row.insertCell(1).textContent = order.product;
        row.insertCell(2).textContent = order.quantity;

        // Assuming you also have the price in your phpData
        row.insertCell(3).textContent = `$${order.price}`;

        // Add the status dropdown
        const statusCell = row.insertCell(4);
        const statusSelect = document.createElement('select');

        // Populate dropdown with options
        ['Processing', 'Shipped', 'Delivered'].forEach(status => {
            const option = document.createElement('option');
            option.value = status;
            option.textContent = status;
            statusSelect.appendChild(option);
        });

        statusCell.appendChild(statusSelect);
    }
});
