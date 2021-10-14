var naam = document.getElementById("name");
var name_error = document.getElementById("name_error");
var email = document.getElementById("email");
var email_error = document.getElementById("email_error");
var number = document.getElementById("number");
var number_error = document.getElementById("number_error");
var password = document.getElementById("password");
var password_error = document.getElementById("password_error");
var confirm = document.getElementById("confirm");
var confirm_error = document.getElementById("confirm_error");

function error(x){
  x.style.boxShadow="0px 0px 10px 4px red";
  x.style.borderColor="red";
}

function no_error(x){
  x.style.boxShadow="0px 0px 10px 4px green";
  x.style.borderColor="green";
}

function validate_name(x){
  if(x.value==''){
    error(x);
    name_error.innerHTML="Name must not be blank";
    name_error.classList.remove('hide');
    return false;
  }else{
    let letters = /^[A-Za-z ]+$/;
     if(x.value.match(letters))
       {
         no_error(x);
         name_error.classList.add('hide');
         return true;
       }else{
         error(x);
         name_error.innerHTML="Invalid Name";
         name_error.classList.remove('hide');
         return false;
       }
  }
}

function validate_email(x){
  if(x.value==''){
    error(x);
    email_error.innerHTML="Email must not be blank";
    email_error.classList.remove('hide');
    return false;
  }else{
    let letters = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
     if(x.value.match(letters))
       {
         no_error(x);
         email_error.classList.add('hide');
         return true;
       }else{
         error(x);
         email_error.innerHTML="Invalid Email";
         email_error.classList.remove('hide');
         return false;
       }
  }
}

function validate_number(x){
  if(x.value==''){
    error(x);
    number_error.innerHTML="Number must not be blank";
    number_error.classList.remove('hide');
    return false;
  }else{
    let letters = /^([0-9]{10})$/;
     if(x.value.match(letters))
       {
         no_error(x);
         number_error.classList.add('hide');
         return true;
       }else{
         error(x);
         number_error.innerHTML="Invalid Number";
         number_error.classList.remove('hide');
         return false;
       }
  }
}

function validate_password(x){
  if(x.value==''){
    error(x);
    password_error.innerHTML="Password must not be blank";
    password_error.classList.remove('hide');
    return false;
  }else{
   no_error(x);
   password_error.classList.add('hide');
   return true;
  }
}

function validate_confirm(x){
  if(x.value==''){
    error(x);
    confirm_error.innerHTML="It must not be blank";
    confirm_error.classList.remove('hide');
    return false;
  }else{
    if(password.value==x.value){
      no_error(x);
      confirm_error.classList.add('hide');
      return true;
    }else{
      error(x);
      confirm_error.innerHTML="Password did not match";
      confirm_error.classList.remove('hide');
      return false;

    }
  }
}

function validate_form(){
  // console.log("It worked!");
  return  validate_name(naam) && validate_email(email) && validate_number(number) && validate_confirm(confirm) && validate_password(password);

}
