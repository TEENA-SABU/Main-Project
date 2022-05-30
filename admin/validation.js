var username = document.getElementById('out_user');
var email = document.getElementById('out_email');
//var place_out = document.getElementById('out_place');
var phone_out = document.getElementById('out_phone');
var pass1_out = document.getElementById('out_pass1');
//var pass2_out= document.getElementById('out_pass2');

var outuser = document.Registration.username;
var outmail = document.Registration.email;
//var outplace=document.user_form.place;
var outphone = document.user_form.phone;
var outpass1 = document.user_form.password;
//var outpass2=document.user_form.password1;
//username validation
function usercheck() {
    if (outuser.value.length >= 4 && outuser.value.match(/^[A-Za-z]+$/)) {
        document.getElementById('out_user').innerHTML = "";
    } else {
        document.getElementById('out_user').innerHTML = "Please enter a valid username";
        document.Registration.username.focus();
    }
}

//email validation
function mailcheck() {
    if (outmail.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        out_email.innerHTML = "";
    } else {
        out_email.innerHTML = "Please enter Valid email";
        document.Registration.email.focus();
    }
}
//phone number validation
function mobilecheck() {
    if (document.getElementById('out_phonevalue').value.match(/^(\+\d{1,3}[- ]?)?\d{10}$/)) {
        document.getElementById('out_phone').innerHTML = "";
    } else {
        document.getElementById('out_phone').innerHTML = "Please enter Valid Mobile no:";
        document.user_form.phone.focus();
    }
}
//password validation
function pass1check() {
    if (outpass1.value.match(/^[A-Za-z]\w{5,10}$/)) {
        out_pass1.innerHTML = "";
    } else {
        out_pass1.innerHTML = "7 to 15 characters which contain at least one numeric digit, one uppercase and one lowercase letter";
        document.user_form.password.focus();
    }
}
//confirm password
function pass2check() {
    if (outpass2.value == outpass1.value) {
        out_pass2.innerHTML = "";
    } else {
        out_pass2.innerHTML = "Password doesn't Match";
        document.user_form.password1.focus();
    }
}
