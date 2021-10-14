var username = document.getElementById('username');
var username_error = document.getElementById('username_error');
var password = document.getElementById('password');
var password_error = document.getElementById('password_error');
function nameCheck(x){
  if(x.value==''){
    username_error.innerHTML = "Username must not be blank";
    username_error.classList.remove('hide');
    username.style.boxShadow="0px 0px 10px 4px red";
    username.style.borderColor="red";
    return false;
  }else{
    username_error.innerHTML = "";
    username_error.classList.add('hide');
    username.style.boxShadow="0px 0px 10px 4px green";
    username.style.borderColor="green";
    return true;

  }
}
function passwordCheck(x){
  if(x.value==''){
    password_error.innerHTML = "Password must not be blank";
    password_error.classList.remove('hide');
    password.style.boxShadow="0px 0px 10px 4px red";
    password.style.borderColor="red";
    return false;
  }else{
    password_error.innerHTML = "";
    password_error.classList.add('hide');
    password.style.boxShadow="0px 0px 10px 4px green";
    password.style.borderColor="green";
    return true;

  }
}
function validateForm(){
  return nameCheck(username) && passwordCheck(password);
}
