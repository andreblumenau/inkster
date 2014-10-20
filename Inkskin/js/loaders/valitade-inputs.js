// Validate Zip Code
function validateZipCode(zipCode) {
    var re = /^([0-9]{5})(?:[-\s]*([0-9]{3}))?$/;
    if (re.test(document.getElementById(zipCode).value)) {
        document.getElementById(zipCode + 'Error').style.display = 'none';
        return true;
    } else {
        document.getElementById(zipCode + 'Error').style.display = 'block';
        return false;
    }
}

function validateInput(input) {
    // Validation rule
    var re = /^[A-Za-z\s-']+$/;
    // Check input
    if (re.test(document.getElementById(input).value)) {
        // Hide error prompt
        document.getElementById(input + 'Error').style.display = "none";
        return true;
    } else {
        // Show error prompt
        document.getElementById(input + 'Error').style.display = "block";
        return false;
    }
}

//Validate CPF/CNPJ
function validateCPF(cpf) {
    var re = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;
    if (re.test(document.getElementById(cpf).value)) {
        document.getElementById(cpf + 'Error').style.display = 'none';
        return true;
    } else {
        document.getElementById(cpf + 'Error').style.display = 'block';
        return false;
    }
}

// Validate E-mail
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(document.getElementById(email).value)) {
        document.getElementById(email + 'Error').style.display = 'none';
        return true;
    } else {
        document.getElementById(email + 'Error').style.display = 'block';
        return false;
    }
}

// Validate Phone
function validatePhone(phone) {
    var re = /^[(]{0,1}[0-9]{2}[)]{0,1}[-\s\.]{0,1}[0-9]{4}[-\s\.]{0,1}[0-9]{4}$/;
    if (re.test(document.getElementById(phone).value)) {
        document.getElementById(phone + 'Error').style.display = 'none';
        return true;
    } else {
        document.getElementById(phone + 'Error').style.display = 'block';
        return false;
    }
}

//Validate Username
function validateUsername(user) {
    var re = /^[a-z][\w\.]{0,30}$/i; // or "/^[a-zA-Z0-9]+$/;"
    if (re.test(document.getElementById(user).value)) {
        document.getElementById(user + 'Error').style.display = 'none';
        return true;
    } else {
        document.getElementById(user + 'Error').style.display = 'block';
        return false;
    }
}

//Validate Password
function validatePassword(psw) {
    var re = /^[a-zA-Z0-9]+$/i; // or /^[a-z][\w\.]{0,30}$/i
    if (re.test(document.getElementById(psw).value)) {
        document.getElementById(psw + 'Error').style.display = 'none';
        return true;
    } else {
        document.getElementById(psw + 'Error').style.display = 'block';
        return false;
    }
}

function checkPass() {
    // Store the password field objects into variables ...
    var pass1 = document.getElementById('txtRegisterPassword');
    var pass2 = document.getElementById('txtRegisterSetPassword');
    // Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');

    // Compare the values in the password field
    // and the confirmation field
    if (pass1.value == pass2.value) {
        // The passwords match.
        // Set the color to the good color and inform
        // the user that they have entered the correct password
        message.innerHTML = "Senhas validadas com sucesso";
        message.style.color = "#006400";
        message.style.display = "block";
        message.style.border = "1px solid #006400";
        message.style.background = "#C1FFC1";
        message.style.padding = "6px 8px";
    } else {
        // The passwords do not match.
        // Set the color to the bad color and
        // notify the user.
        message.innerHTML = "Senhas não conferem!";
        message.style.color = "#c00";
        message.style.display = "block";
        message.style.border = "1px solid #c00";
        message.style.background = "#FEF1ED";
        message.style.padding = "6px 8px";
        return false;
    }
    if (pass1.value.length < 8 || pass2.value.length < 8 && pass1.value == pass2.value) {
        message.innerHTML = "Tamanho de Senha insuficiente";
        message.style.color = "#c00";
        message.style.display = "block";
        message.style.border = "1px solid #c00";
        message.style.background = "#FEF1ED";
        message.style.padding = "6px 8px";
        return false;
    } else {
        return true;
    }
}

function checkPassAccount() {
    // Store the password field objects into variables ...
    var pass1 = document.getElementById('txtAccountUserPassword');
    var pass2 = document.getElementById('txtAccountUserConfPassword');
    // Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessageAccount');

    // Compare the values in the password field
    // and the confirmation field
    if (pass1.value.length < 8 || pass2.value.length < 8) {
        message.innerHTML = "Tamanho de Senha insuficiente";
        message.style.color = "#c00";
        message.style.display = "block";
        message.style.border = "1px solid #c00";
        message.style.background = "#FEF1ED";
        message.style.padding = "6px 8px";
        return false;
    } else if (pass1.value == pass2.value) {
        message.innerHTML = "Senhas não podem ser iguais";
        message.style.color = "#c00";
        message.style.display = "block";
        message.style.border = "1px solid #c00";
        message.style.background = "#FEF1ED";
        message.style.padding = "6px 8px";
        return false;
    } else {
        // The passwords match.
        // Set the color to the good color and inform
        // the user that they have entered the correct password
        message.innerHTML = "";
        message.style.color = "none";
        message.style.display = "none";
        message.style.border = "0 solid none";
        message.style.background = "none";
        message.style.padding = "0";
        return true;
    }
}
/*
function validateMessage(message) {
    // Validation rule
    var re = /^[a-zA-Z0-9]+$/;
    // Check input
    if (re.test(document.getElementById(message).value)) {
        // Hide error prompt
        document.getElementById(message + 'Error').style.display = "none";
        return true;
    } else {
        // Show error prompt
        document.getElementById(message + 'Error').style.display = "block";
        return false;
    }
}
*/
/*
function checkMessage() {
    // Store message field objects into variables ...
    var messageField = document.getElementById('contactMessage');
    // Store the Confimation Message Object ...
    var msgDisplay = document.getElementById('confirmCMessage');
    // Set the colors we will be using ...
    var badColor = "#FF0000";
    var min = 5;
    // Validate messate length string to user
    if (messageField.value.length < min) {
        msgDisplay.style.color = badColor;
        msgDisplay.innerHTML = "Tamanho da mensagem insuficiente";
        return false;
    } else {
        msgDisplay.style.color = "none";
        msgDisplay.innerHTML = null;
        return true;
    }
}
*/
function validateForm() {
    // Set error catcher
    var error = 0;
    // Register Form
    var msgUser = document.getElementById('txtRegisterUsernameError');
    var msgEmail = document.getElementById('txtRegisterEmailError');
    var msgPass = document.getElementById('txtRegisterPasswordError');

    // Validate email
    if (!validateEmail('txtRegisterEmail')) {
        document.getElementById('txtRegisterEmailError').style.display = "block";
        msgEmail.style.color = "#c00";
        msgEmail.style.display = "block";
        msgEmail.style.border = "1px solid #c00";
        msgEmail.style.background = "#FEF1ED";
        msgEmail.innerHTML = "Informe um E-mail válido";
        msgEmail.style.padding = "6px 8px";
        error++;
    }
    // Validate Username
    if (!validateUsername('txtRegisterUsername')) {
        document.getElementById('txtRegisterUsernameError').style.display = "block";
        msgUser.style.color = "#c00";
        msgUser.style.display = "block";
        msgUser.style.border = "1px solid #c00";
        msgUser.style.background = "#FEF1ED";
        msgUser.innerHTML = "Informe um Usuário válido";
        msgUser.style.padding = "6px 8px";
        error++;
    }
    // Validate and Check Passwords
    if (!validatePassword('txtRegisterPassword')) {
        document.getElementById('txtRegisterPasswordError').style.display = "block";
        msgPass.style.color = "#c00";
        msgPass.style.display = "block";
        msgPass.style.border = "1px solid #c00";
        msgPass.style.background = "#FEF1ED";
        msgPass.innerHTML = "Campo Senha deve ser preenchido";
        msgPass.style.padding = "6px 8px";
        error++;
    }
    if (!checkPass()) {
        error++;
    }
    // Don't submit form if there are errors
    if (error > 0) {
        return false;
    }
}

function validateFormAccount() {
    // Set error catcher
    var errors = 0;
    // Register Form
    //var msgPwd = document.getElementById('txtAccountUserPasswordError');
    var msgPass = document.getElementById('txtAccountUserPasswordError');

    // Validate and Check Passwords
    if (!validatePassword('txtAccountUserPassword')) {
        document.getElementById('txtAccountUserPasswordError').style.display = "block";
        msgPass.innerHTML = "Este campo deve conter letras ou números";
        msgPass.style.color = "#c00";
        msgPass.style.display = "block";
        msgPass.style.border = "1px solid #c00";
        msgPass.style.background = "#FEF1ED";
        msgPass.style.padding = "6px 8px";
        errors++;
    }
    if (!checkPassAccount()) {
        errors++;
    }
    // Don't submit form if there are errors
    if (errors > 0) {
        return false;
    }
}
/**
 * onblur="return validateForm(myinput); return false;"
 */
