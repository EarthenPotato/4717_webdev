document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('table');
    const tbody = table.querySelector('tbody');
    
    console.log(phpData);

    const allQuantitiesZero = phpData.every(order => order.quantity === 0);

    if (allQuantitiesZero) {
        const emptyRow = tbody.insertRow();
        const emptyCell = emptyRow.insertCell(0);
        emptyCell.colSpan = 5;
        emptyCell.textContent = 'Your cart is empty';
    } else {
        for (const order of phpData) {
            if (order.quantity > 0) { 
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
                row.insertCell(3).textContent = order.price * order.quantity;
                
                const form = document.createElement('form');
                form.method = 'post';
                form.action = 'shopping_cart.php';
    
                const productInput = document.createElement('input');
                productInput.type = 'hidden';
                productInput.name = 'product';
                productInput.value = order.product;
                form.appendChild(productInput);
    
                // Create a delete button
                const deleteButton = document.createElement('button');
                deleteButton.name = "delete";
                deleteButton.textContent = 'Delete';
                deleteButton.type = 'submit';
                form.appendChild(deleteButton);
    
                // Add the form with the delete button to the row
                row.insertCell(4).appendChild(form);
            }
        }
    }
});
