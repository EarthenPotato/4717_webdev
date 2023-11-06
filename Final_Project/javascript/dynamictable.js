document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('table');
    const tbody = table.querySelector('tbody');
    
    for (const order of phpData) {
        if (order.quantity > 0) { 
        const row = tbody.insertRow();
        
        // console.log(order.product, order.quantity);
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
    }
}});
