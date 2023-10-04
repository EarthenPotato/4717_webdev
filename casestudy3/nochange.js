// nochange.js
//   This script illustrates using the focus event
//   to prevent the user from changing a text field

// The event handler function to compute the cost

function computeCost() {
  var Just_Java = document.getElementById("1").value;
  var Cafe_au_Lait_s = document.getElementById("2").value;
  var Cafe_au_Lait_d = document.getElementById("3").value;
  var Iced_Cappuccino_s = document.getElementById("4").value;
  var Iced_Cappuccino_d = document.getElementById("5").value;
// Compute the cost

  document.getElementById("cost").value = 
  totalCost = Just_Java * 2.00
            + Cafe_au_Lait_s * 2.00
            + Cafe_au_Lait_d * 3.00
            + Iced_Cappuccino_s * 4.75
            + Iced_Cappuccino_d * 5.75;
}  //* end of computeCost

function computeSubCost(Cafe_au_Lait_price,Iced_Cappuccino_price,Just_Java_price){
  var Just_Java = document.getElementById("Java_num").value
  var Cafe_au_Lait = document.getElementById("Cafe_num").value
  var Iced_Cappuccino = document.getElementById("Iced_num").value

  Java_cost = Just_Java * Just_Java_price
  Cafe_au_Lait_cost = Cafe_au_Lait * Cafe_au_Lait_price
  Iced_Cappuccino_cost = Iced_Cappuccino * Iced_Cappuccino_price

  sub_cost = Java_cost + Cafe_au_Lait_cost + Iced_Cappuccino_cost
  
  return sub_cost
}

function radio_value(drink_name){
  console.log(drink_name);
  var dom = document.getElementsByName(drink_name)
  // console.log(dom)
  
  for (var index = 0; index < dom.length; 
      index++) {
    console.log(index);
    if (dom[index].checked) {
      drink = dom[index].value;
      break;
      }}
    console.log("this is drink",drink)

  switch (drink) {
    case '1': 
      price = computeSubCost(0,0,2);
      console.log(price);
      break;
    case '2': 
      computeSubCost(0,2,0);
      break; 
    case '3':
      computeSubCost(0,3,0);
      console.log(price);
      break;    
    case '4':
      computeSubCost(4.75,0,0);
      break; 
    case '5':
      computeSubCost(5.75,0,0);
      break;
    default:
      alert("Please select a drink");
      break;
  }
}

