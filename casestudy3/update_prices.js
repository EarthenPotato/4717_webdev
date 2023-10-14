
function changePrice(drink, price) {
    // console.log(drink,price)
}

function checkDrinkCheckboxes() {
    const drinkCheckboxes = document.querySelectorAll('.drinkCheck');
    const priceInputIds = {
        javacheck: ['JavaPrice'],
        cafecheck: ['CafeSinglePrice', 'CafeDoublePrice'],
        icedcheck: ['IcedSinglePrice', 'IcedDoublePrice'],
    };

    drinkCheckboxes.forEach(checkbox => {
        const checkboxName = checkbox.name;
        const priceInputIdsArray = priceInputIds[checkboxName];
        
        if (priceInputIdsArray) {
            priceInputIdsArray.forEach(priceInputId => {
                const priceInputElement = document.getElementById(priceInputId);
                if (priceInputElement) {
                    if (checkbox.checked) {
                        const currentPrice = priceInputElement.value;
                        console.log(`Checkbox "${checkboxName}" is checked.${priceInputElement.id} Changed Price: $${currentPrice}`);
                    } else {
                        console.log(`Checkbox "${checkboxName}" is unchecked.`);
                    }
                } else {
                    console.log(`Price input element not found for checkbox "${checkboxName}"`);
                }
            });
        } else {
            console.log(`Price input elements not found for checkbox "${checkboxName}"`);
        }
    });
}


