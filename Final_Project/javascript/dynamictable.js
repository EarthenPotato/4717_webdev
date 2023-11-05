// Sample order data (you can replace this with your actual data)
document.addEventListener('DOMContentLoaded', function() {

      const table = document.getElementById('orderTable');
      const tbody = table.getElementsByTagName('tbody')[0];
      
      // Loop through the orders and populate the table
    for (const order of orders) {
        if (order.product.includes("AQ")) {
            const productImage = document.createElement('img');
            productImage.src = "pictures/headphone.jpg";
        }
        if (order.product.includes("CQ")) {
            const productImage = document.createElement('img');
            productImage.src = "pictures/computer.jpg";
        }
        if (order.product.includes("TQ")) {
            const productImage = document.createElement('img');
            productImage.src = "pictures/techacc.jpg";
        }

        const row = tbody.insertRow();
        row.insertCell(0).appendChild(productImage)
        row.insertCell(1).textContent = order.product;
        row.insertCell(2).textContent = order.quantity;
        row.insertCell(3).textContent = `$${(order.quantity * order.price).toFixed(2)}`;
        }
    
  });
  

