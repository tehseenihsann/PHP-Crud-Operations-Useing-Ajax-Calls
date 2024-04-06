const userForm = document.getElementById('form');
const userName = document.getElementById('name');
const userEmail = document.getElementById('email');
const userPassword = document.getElementById('password');
const confirmPassword = document.getElementById('confirm');
const phoneNumber = document.getElementById('phone');
const userAddress = document.getElementById('address');
const selectCourse = document.getElementById('course');
const userGender = document.querySelectorAll('input[type="radio"][name="gender"]');
const showP = document.getElementById('show');
const dis = document.getElementById('disable');


const confirmDialog = document.getElementById("confirmDialog");
const confirmYesBtn = document.getElementById("confirmYes");
const confirmNoBtn = document.getElementById("confirmNo");
const submitBtn = document.getElementById('submit');


const phoneno = /^\+?([0]{1})\)?([3]{1})?([0-9]{10})$/;
const specialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
const number = /\d/;
const capital = /[A-Z]/g;

const setError = (input, msg) => {
    input.style.outline = 'none';
    input.style.border = '2px solid red';
    const emError = input.id + 'Err';
    const errorMessage = document.getElementById(emError);
    errorMessage.className = "error";
    errorMessage.innerText = msg;
}

const setSuccess = (input) => {
    input.style.outline = 'none';
    input.style.border = '2px solid green';
    const emError = input.id + 'Err';
    const errorMessage = document.getElementById(emError);
    errorMessage.className = "";
    errorMessage.innerText = "";
}

userName.addEventListener('input', () => {
    const name = userName.value.trim();
    if (name === '') {
        setError(userName, 'This field is required!');
    } else if (name.length < 3) {
        setError(userName, 'Name must be at least 3 characters!');
    } else if (specialChar.test(name)) {
        setError(userName, "Cannot use special character");
    } else if (number.test(name)) {
        setError(userName, "Do not use any number!");
    } else
        setSuccess(userName);
})

userEmail.addEventListener('input', () => {
    const email = userEmail.value.trim();
    if (email === '') {
        setError(userEmail, 'This field is required!');
    } else if (!emailPattern.test(email)) {
        setError(userEmail, 'Follow the proper email fomate');
    } else {
        setSuccess(userEmail);
    }
})

userPassword.addEventListener('input', () => {
    const password = userPassword.value.trim();
    if (password === '') {
        setError(userPassword, 'This field is required!');
    } else if (!(capital.test(password))) {
        setError(userPassword, 'Use at least one capital');
    } else if (!(number.test(password))) {
        setError(userPassword, 'Use at least one number');
    } else if (!(specialChar.test(password))) {
        setError(userPassword, 'Use at least on special character');
    } else if (password.length < 8) {
        setError(userPassword, 'Minimum 8 characters!');
    } else {
        setSuccess(userPassword);
    }
})

confirmPassword.addEventListener('input', () => {
    const confirm = confirmPassword.value.trim();
    if (!(confirm === userPassword.value)) {
        setError(confirmPassword, 'Password not match!');
    } else if (confirm.length < 8) {
        setError(confirmPassword, 'Minimum 8 characters!');
    } else {
        setSuccess(confirmPassword);
    }
})


showP.addEventListener('change', () => {
    if (showP.checked) {
        userPassword.type = 'text';
        confirmPassword.type = 'text';
    } else {
        userPassword.type = 'password';
        confirmPassword.type = 'password';
    }
})

phoneNumber.addEventListener('input', () => {
    const phone = phoneNumber.value.trim();
    if (!phoneno.test(phone)) {
        setError(phoneNumber, 'invalid phone number,');
    } else {
        setSuccess(phoneNumber);
    }
})

userAddress.addEventListener('input', () => {
    const address = userAddress.value.trim();
    if (address.length < 10) {
        setError(userAddress, 'Write street address at least 10 characters');
    } else {
        setSuccess(userAddress);
    }
})
userGender.forEach(radio => {
    radio.addEventListener('change', () => {
        const errorMessage = document.getElementById('genderErr');
        if ((radio.checked)) {
            errorMessage.className = "";
            errorMessage.innerText = "";
        } else {
            errorMessage.className = "error";
            errorMessage.innerText = "Select the gender";
        }
    });
})

selectCourse.addEventListener('change', () => {
    if (selectCourse.value !== '') {
        setSuccess(selectCourse);
    }
})


dis.addEventListener('change', () => {
    if (dis.checked) {
        console.log('disabled');
    } else {
        console.log('enabled');
    }
})



function Confirmation() {
    const inputs = form.querySelectorAll('input, select');

    let isEmpty = false;
    inputs.forEach(input => {
        if (input.type !== 'checkbox' && input.value.trim() === '') {
            isEmpty = true;
        }
        if (input.tagName === 'SELECT' && input.value === '') {
            isEmpty = true;
        }
    });

    if (!isEmpty) {
        return confirm('Do you want to submit this form?');
    } else {
        alert('Required All Fields!');
    }
}


//table


const selectEntry = document.getElementById('entry');
const search = document.getElementById('search');
const chAll = document.getElementById('checkAll');
const chRow = document.getElementsByClassName('row-ch');
const entriesText = document.getElementById('ent');
const preBtn = document.getElementById('pre');
const pgNumber = document.getElementById('pgNum');
const nextBtn = document.getElementById('next');
const dataTable = document.getElementById('dataTable').getElementsByTagName('tbody')[0];

let currentPage = Number(pgNumber.innerHTML);

function showEntries() {
    const rows = dataTable.getElementsByTagName('tr');
    const entriesPerPage = parseInt(selectEntry.value);
    const startIndex = (currentPage - 1) * entriesPerPage;
    const endIndex = Math.min(startIndex + entriesPerPage, rows.length);

    for (let i = 0; i < rows.length; i++) {
        if (i >= startIndex && i < endIndex) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }

    const totalEntries = rows.length;
    entriesText.textContent = `Showing ${startIndex + 1} to ${endIndex} of ${totalEntries} entries.`;
}

function handlePagination(direction) {
    if (direction === 'next' && currentPage < Math.ceil(dataTable.getElementsByTagName('tr').length / selectEntry.value)) {
        currentPage++;
        pgNumber.innerHTML = currentPage;
    } else if (direction === 'prev' && currentPage > 1) {
        currentPage--;
        pgNumber.innerHTML = currentPage;
    }
    showEntries();
}

selectEntry.addEventListener('change', () => {
    currentPage = 1;
    showEntries();
});

chAll.addEventListener('change', () => {
    const chRow = document.getElementsByClassName('row-ch');
    for (let i = 0; i < chRow.length; i++) {
        chRow[i].checked = chAll.checked;
    }
});

search.addEventListener('input', () => {
    performSearch(search.value);
});

preBtn.addEventListener('click', () => {
    handlePagination('prev');
});

nextBtn.addEventListener('click', () => {
    handlePagination('next');
});

showEntries();


function performSearch(searchValue) {
    const rows = dataTable.querySelectorAll('tbody tr');
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let found = false;
        for (let j = 0; j < cells.length; j++) {
            const cellText = cells[j].textContent || cells[j].innerText;
            if (cellText.toLowerCase().indexOf(searchValue.toLowerCase()) > -1) {
                found = true;
                break;
            }
        }
        rows[i].style.display = found ? '' : 'none';
    }
}

search.addEventListener('input', () => {
    performSearch(search.value);
});
