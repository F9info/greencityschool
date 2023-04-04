$(function () {
    $(".show-year .form-control")
        .on("click", function () {
            $(this)
                .closest("body")
                .find(".ui-datepicker-year")
                .addClass("active");
        })
        .on("focus", function () {
            $(this)
                .closest("body")
                .find(".ui-datepicker-year")
                .addClass("active");
        })
        .on("blur", function () {
            $(this)
                .closest("body")
                .find(".ui-datepicker-year")
                .addClass("active");
        });
});

$(function () {
    const passwordInput = document.querySelector("#password");
    const confirmPasswordInput = document.querySelector("#password-confirm");
    const passowrdError = document.querySelector("#phone-error");

    // password
    // password Eye Button
    const togglePasswordVisibilityButton = document.querySelector(".pwd-btn");
    togglePasswordVisibilityButton.addEventListener("click", () => {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";

            togglePasswordVisibilityButton.classList.add("active");
        } else {
            passwordInput.type = "password";
            togglePasswordVisibilityButton.classList.remove("active");
        }
    });
    // password-confirm
    const passwordMatchIndicator = document.querySelector(
        "#password-match-label"
    );
    confirmPasswordInput.addEventListener("input", () => {
        if (passwordInput.value === confirmPasswordInput.value) {
            passowrdError.textContent = "Passwords match";
        } else {
            passowrdError.textContent = "Passwords do not match";
        }
    });
    passwordInput.addEventListener("input", checkPasswords);
    confirmPasswordInput.addEventListener("input", checkPasswords);

    function checkPasswords() {
        if (passwordInput.value == confirmPasswordInput.value) {
            passwordMatchIndicator.classList.remove("invalid");
            passwordMatchIndicator.classList.add("active");
        } else {
            passwordMatchIndicator.classList.remove("active");
            passwordMatchIndicator.classList.add("invalid");
        }
    }
    // password-validation
    const lowercaseCriteria = document.querySelector("#lowercase");
    const uppercaseCriteria = document.querySelector("#uppercase");
    const numberCriteria = document.querySelector("#number");
    const lengthCriteria = document.querySelector("#length");
    const specialCharactersCriteria = document.querySelector(
        "#special_characters"
    );
    passwordInput.addEventListener("input", () => {
        // Get the password value
        const password = passwordInput.value;

        // Check the password against your criteria
        if (password.match(/[a-z]/)) {
            lowercaseCriteria.classList.add("valid");
            lowercaseCriteria.classList.remove("invalid");
        } else {
            lowercaseCriteria.classList.add("invalid");
            lowercaseCriteria.classList.remove("valid");
        }
        if (password.match(/[A-Z]/)) {
            uppercaseCriteria.classList.add("valid");
            uppercaseCriteria.classList.remove("invalid");
        } else {
            uppercaseCriteria.classList.add("invalid");
            uppercaseCriteria.classList.remove("valid");
        }
        if (password.match(/[0-9]/)) {
            numberCriteria.classList.add("valid");
            numberCriteria.classList.remove("invalid");
        } else {
            numberCriteria.classList.add("invalid");
            numberCriteria.classList.remove("valid");
        }
        if (password.length >= 8 && password.length <= 50) {
            lengthCriteria.classList.add("valid");
            lengthCriteria.classList.remove("invalid");
        } else {
            lengthCriteria.classList.add("invalid");
            lengthCriteria.classList.remove("valid");
        }

        if (password.match(/[^a-zA-Z0-9]/)) {
            specialCharactersCriteria.classList.add("valid");
            specialCharactersCriteria.classList.remove("invalid");
        } else {
            specialCharactersCriteria.classList.add("invalid");
            specialCharactersCriteria.classList.remove("valid");
        }
    });
});

var input = document.querySelector(".digitsonly");
input.addEventListener("keypress", (event) => {
    var charCode = event.which ? event.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
        return false;
    }
    return true;
});
$(function () {
    const phoneInput = document.querySelector("#phone");

    phoneInput.addEventListener("input", () => {
        const formattedPhoneNumber = formatPhoneNumber(phoneInput.value);
        phoneInput.value = formattedPhoneNumber;
    });

    function formatPhoneNumber(phoneNumber) {
        return phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
    }
});

$(function () {
    const phoneInput = document.querySelector("#phone2");

    phoneInput.addEventListener("input", () => {
        const formattedPhoneNumber = formatPhoneNumber(phoneInput.value);
        phoneInput.value = formattedPhoneNumber;
    });

    function formatPhoneNumber(phoneNumber) {
        return phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
    }
});

$(function () {
    const phoneInput = document.querySelector("#phone3");

    phoneInput.addEventListener("input", () => {
        const formattedPhoneNumber = formatPhoneNumber(phoneInput.value);
        phoneInput.value = formattedPhoneNumber;
    });

    function formatPhoneNumber(phoneNumber) {
        return phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
    }
});

document
    .getElementById("numeric-input")
    .addEventListener("input", function (e) {
        var ch = String.fromCharCode(e.which);
        if (!/[0-9]/.test(ch)) {
            e.preventDefault();
        }
    });
