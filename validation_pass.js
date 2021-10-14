var old = document.getElementById("old");
var old_error = document.getElementById("old_error");
var new_pass = document.getElementById("new_pass");
var new_error = document.getElementById("new_error");

function error(x){
  x.style.boxShadow="0px 0px 10px 4px red";
  x.style.borderColor="red";
}

function no_error(x){
  x.style.boxShadow="0px 0px 10px 4px green";
  x.style.borderColor="green";
}

function validate_old(x){
  if(x.value==''){
    error(x);
    old_error.innerHTML="Password must not be blank";
    old_error.classList.remove('hide');
    return false;
  }else{
   no_error(x);
   old_error.classList.add('hide');
   return true;
  }
}

function validate_new(x){
  if(x.value==''){
    error(x);
    new_error.innerHTML="Password must not be blank";
    new_error.classList.remove('hide');
    return false;
  }else{
   no_error(x);
   new_error.classList.add('hide');
   return true;
  }
}

function validate_pass(){
  return (validate_old(old)) && (validate_new(new_pass));
}
