// Error Checking
document.getElementById("login").onsubmit = validate;

//client side validation
function validate() {
    //flag variable
    let isValid = true;

    // clear all error messages
    let errors = document.getElementsByClassName("err");
    for (let i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";
    }

    // Check username
    let first = document.getElementById("username").value;
    if (first === "") {
        let errUser = document.getElementById("err-username");
        errUser.style.display = "inline";
        isValid = false;
    }

    //check password
    let last = document.getElementById("password").value;
    if (last === "") {
        let errPass = document.getElementById("err-password");
        errPass.style.display = "inline";
        isValid = false;
    }

    return isValid;
}