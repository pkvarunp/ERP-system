const form = document.getElementById('form');
const item_code = document.getElementById('item_code');
const item_category = document.getElementById('item_category');
const item_subcategory = document.getElementById('item_subcategory');
const item_name = document.getElementById('item_name');
const quantity = document.getElementById('quantity');
const unit_price = document.getElementById('unit_price');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (validateInputs()) {
        form.submit(); 
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const contactNumberRegex = /^\d+$/;

const validateInputs = () => {
    const item_codeValue = item_code.value.trim();
    const item_nameValue = item_name.value.trim();
    const quantityValue = quantity.value.trim();
    const unit_priceValue = unit_price.value.trim();

    let isValid = true;

    if (item_codeValue === '') {
        setError(item_code, 'Item code is required');
        isValid = false;
    } else {
        setSuccess(item_code);
    }

    if (item_nameValue === '') {
        setError(item_name, 'Item name is required');
        isValid = false;
    } else {
        setSuccess(item_name);
    }

    if (quantityValue === '') {
        setError(quantity, 'quantity is required');
        isValid = false;
    } else if (!contactNumberRegex.test(quantityValue)) {
        setError(quantity, 'quantity should be a number');
        isValid = false;
    } else {
        setSuccess(quantity);
    }
    if (unit_priceValue === '') {
        setError(unit_price, 'Unit price is required');
        isValid = false;
    } else if (!contactNumberRegex.test(unit_priceValue)) {
        setError(unit_price, 'Unit price should be a number');
        isValid = false;
    } else {
        setSuccess(unit_price);
    }

   
    return isValid;
};
