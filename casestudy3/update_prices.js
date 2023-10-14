
function changePrice(drink, price) {
    // console.log(drink,price)
}


function checkDrinkCheckboxes() {
    var checkboxes = document.querySelectorAll('.drinkCheck');
    var checkedNames = [];

    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            checkedNames.push(checkbox.name);
        }
    });

    if (checkedNames.length > 0) {
        console.log('Checked checkbox names: ' + checkedNames.join(', '));
    } else {
        console.log('No checkboxes are checked.');
    }
}