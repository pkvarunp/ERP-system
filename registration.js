const form = document.getElementById('form');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const cnum = document.getElementById('cnum');
const dis = document.getElementById('dis');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (validateInputs()) {
        form.submit(); // Submit the form if validation passes
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
    const fnameValue = fname.value.trim();
    const lnameValue = lname.value.trim();
    const cnumValue = cnum.value.trim();
    const disValue = dis.value.trim();

    let isValid = true;

    if (fnameValue === '') {
        setError(fname, 'First name is required');
        isValid = false;
    } else {
        setSuccess(fname);
    }

    if (lnameValue === '') {
        setError(lname, 'Last name is required');
        isValid = false;
    } else {
        setSuccess(lname);
    }

    if (cnumValue === '') {
        setError(cnum, 'Contact number is required');
        isValid = false;
    } else if (!contactNumberRegex.test(cnumValue)) {
        setError(cnum, 'Provide a valid contact number');
        isValid = false;
    } else {
        setSuccess(cnum);
    }

    if (disValue === '') {
        setError(dis, 'District is required');
        isValid = false;
    } else {
        setSuccess(dis);
    }

    return isValid;
};
