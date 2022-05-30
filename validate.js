var user_out= document.getElementById('out_user');
var email_out= document.getElementById('out_email');
var phone_out= document.getElementById('out_phone');
var pass1_out= document.getElementById('out_pass1');
var pass2_out= document.getElementById('out_pass2');

var outuser=document.user_form.username;
var outmail=document.user_form.email;
var outphone=document.user_form.phone;
var outpass1=document.user_form.password;
var outpass2=document.user_form.password1;
//username validation
function usercheck()
  {
    if(outuser.value.length >=7 )
    {
      out_user.innerHTML="";
    } else
    {
      out_user.innerHTML="Please enter a valid username";
      document.user_form.username.focus();
    }
  }
//email validation
function mailcheck()
  {
    if(outmail.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
    {
      out_email.innerHTML="";
    } else
    {
      out_email.innerHTML="Please enter Valid email";
      document.user_form.email.focus();
    }
  }
//phone number validation
  function mobilecheck()
  {
    if(outphone.value.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/))
    {
      out_phone.innerHTML="";
    } else
    {
      out_phone.innerHTML="Please enter Valid Mobile no:";
      document.user_form.phone.focus();
    }
  }
//password validation
  function pass1check()
  {
    if(outpass1.value.match(/^[A-Za-z]\w{7,14}$/))
    {
      out_pass1.innerHTML="";
    } else
    {
      out_pass1.innerHTML="6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter";
      document.user_form.password1.focus();
    }
  }
//confirm password
  function pass2check()
  {
    if(outpass2.value==outpass1.value)
    {
      out_pass2.innerHTML="";
    } else
    {
      out_pass2.innerHTML="Password doesn't Match";
      document.user_form.password2.focus();
    }
  }