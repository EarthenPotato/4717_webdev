
function changePrice(drink, price) {
    // console.log(drink,price)
}

function checkDrinkCheckboxes() {
    const drinkCheckboxes = document.querySelectorAll('.drinkCheck');
    const priceInputIds = ['JavaPrice', 'CafeSinglePrice', 'IcedSinglePrice', 'CafeDoublePrice', 'IcedDoublePrice'];

    drinkCheckboxes.forEach((checkbox, index) => {
        const checkboxName = checkbox.name;
        const priceInputId = priceInputIds[index];
        const priceInputElement = document.getElementById(priceInputId);
        
        if (priceInputElement) {
            if (checkbox.checked) {
                const currentPrice = priceInputElement.value;
                console.log(`Checkbox "${checkboxName}" is checked. Current Price: $${currentPrice}`);
            } else {
                console.log(`Checkbox "${checkboxName}" is unchecked.`);
            }
        } else {
            console.log(`Price input element not found for checkbox "${checkboxName}"`);
        }
    });
}

