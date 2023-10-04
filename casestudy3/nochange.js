// nochange.js
//   This script illustrates using the focus event
//   to prevent the user from changing a text field

// The event handler function to compute the cost
var Java_btn
var Cafe_btn
var Iced_btn
function computeCost() {
  var Java_sub_cost_text = document.getElementById("Java_sub_cost").textContent.trim();
  var Cafe_sub_cost_text = document.getElementById("Cafe_sub_cost").textContent.trim();
  var Iced_sub_cost_text = document.getElementById("Iced_sub_cost").textContent.trim();

  // Remove non-numeric characters from the text
  Java_sub_cost_text = Java_sub_cost_text.replace(/[^0-9.]/g, '');
  Cafe_sub_cost_text = Cafe_sub_cost_text.replace(/[^0-9.]/g, '');
  Iced_sub_cost_text = Iced_sub_cost_text.replace(/[^0-9.]/g, '');

  var Java_sub_cost = parseFloat(Java_sub_cost_text);
  var Cafe_sub_cost = parseFloat(Cafe_sub_cost_text);
  var Iced_sub_cost = parseFloat(Iced_sub_cost_text);

  var totalCost = Java_sub_cost + Cafe_sub_cost + Iced_sub_cost;
  console.log (totalCost)
  document.getElementById("Total_Price").textContent = '$' + totalCost.toFixed(2); // Format as currency with 2 decimal places
}


function computeSubCost(Iced_Cappuccino_price,Cafe_au_Lait_price,Just_Java_price){
  var Just_Java = document.getElementById("Java_num").value
  var Cafe_au_Lait = document.getElementById("Cafe_num").value
  var Iced_Cappuccino = document.getElementById("Iced_num").value

  Java_cost = Just_Java * Just_Java_price
  Cafe_au_Lait_cost = Cafe_au_Lait * Cafe_au_Lait_price
  Iced_Cappuccino_cost = Iced_Cappuccino * Iced_Cappuccino_price

  sub_cost = Java_cost + Cafe_au_Lait_cost + Iced_Cappuccino_cost
  console.log('this is subcost', sub_cost)
  return sub_cost.toFixed(2)
}

function radio_value(drink_name){
  console.log(drink_name);
  var dom = document.getElementsByName(drink_name)
  
  for (var index = 0; index < dom.length; index++) {
    console.log(index);
    if (dom[index].checked) {
      drink = dom[index].value;
      break;
      }}
    console.log("this is drink",drink)

  switch (drink) {
    case '1': 
      computeSubCost(0,0,2);
      Java_btn = 0
      break;
    case '2': 
      computeSubCost(0,2,0);
      Cafe_btn = 0
      break; 
    case '3':
      computeSubCost(0,3,0);
      Cafe_btn = 1
      break;    
    case '4':
      computeSubCost(4.75,0,0);
      Iced_btn = 0
      break; 
    case '5':
      computeSubCost(5.75,0,0);
      Iced_btn = 1
      break;
    default:
      alert("Please select a drink");
      break;
  }
  return drink 
}

function update_sub_price(drink_name){
  if (drink_name == 'Java'){
    if (Java_btn == 0){
      document.getElementById("Java_sub_cost").textContent = "$" +computeSubCost(0,0,2);
    }
    else{
      alert("Please select a drink");
    }
  }
  if (drink_name == 'Cafe'){
    if (Cafe_btn == 0){
      document.getElementById("Cafe_sub_cost").textContent = "$" +computeSubCost(0,2,0);
    }
    else if(Cafe_btn == 1){
      document.getElementById("Cafe_sub_cost").textContent = "$" +computeSubCost(0,3,0);
    }
    else{
      alert("Please select a drink");
    }
  }
  if (drink_name == 'Iced'){
    if (Iced_btn == 0){
      document.getElementById("Iced_sub_cost").textContent = "$" +computeSubCost(4.75,0,0);
    }
    else if (Iced_btn == 1){
      document.getElementById("Iced_sub_cost").textContent = "$" +computeSubCost(5.75,0,0);
    }
    else{
      alert("Please select a drink");
    }
  }
}