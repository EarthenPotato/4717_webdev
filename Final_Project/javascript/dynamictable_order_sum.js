document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('table');
    const tbody = table.querySelector('tbody');

    console.log(phpData);

    let allQuantitiesZero = true; 
    let totalPrice = 0;

    for (const order of phpData) {
        if (order.quantity > 0) { 
            allQuantitiesZero = false; 
            const row = tbody.insertRow();

            console.log(order.product, order.quantity, order.price);
            const productImage = document.createElement('img');
            productImage.style.width = '10%';

            if (order.product.includes("AQ")) {
                productImage.src = "pictures/headphone.jpg";
            } else if (order.product.includes("CQ")) {
                productImage.src = "pictures/computer.jpg";
            } else if (order.product.includes("TQ")) {
                productImage.src = "pictures/techacc.jpg";
            }

            row.insertCell(0).appendChild(productImage);
            row.insertCell(1).textContent = order.product;
            row.insertCell(2).textContent = order.quantity;
            const subtotal = order.price * order.quantity;
            row.insertCell(3).textContent = subtotal.toFixed(2);

            totalPrice += subtotal; 
        }
    }

    if (allQuantitiesZero) {
        const emptyRow = tbody.insertRow();
        const emptyCell = emptyRow.insertCell(0);
        emptyCell.colSpan = 5;
        emptyCell.textContent = 'Your cart is empty';
    }

    const totalRow = tbody.insertRow();
    totalRow.insertCell(0);
    totalRow.insertCell(1).textContent = 'Total Price';
    totalRow.insertCell(2); 
    totalRow.insertCell(3).textContent = totalPrice.toFixed(2); 
});
