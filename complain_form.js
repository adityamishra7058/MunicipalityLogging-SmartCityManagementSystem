var naam = document.getElementById("name");
var name_error = document.getElementById("name_error");
// var email = document.getElementById("email");
// var email_error = document.getElementById("email_error");
var number = document.getElementById("number");
var number_error = document.getElementById("number_error");
var description = document.getElementById('description');
var description_error = document.getElementById('description_error');

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

// function validate_email(x){
//   if(x.value==''){
//     error(x);
//     email_error.innerHTML="Email must not be blank";
//     email_error.classList.remove('hide');
//     return false;
//   }else{
//     let letters = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
//      if(x.value.match(letters))
//        {
//          no_error(x);
//          email_error.classList.add('hide');
//          return true;
//        }else{
//          error(x);
//          email_error.innerHTML="Invalid Email";
//          email_error.classList.remove('hide');
//          return false;
//        }
//   }
// }

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
function validate_description(x){
  if(x.value==''){
    description_error.innerHTML = "Description must not be blank";
    description_error.classList.remove('hide');
    description.style.boxShadow="0px 0px 10px 4px red";
    description.style.borderColor="red";
    return false;
  }else{
    let len = x.value.split(" ");
    if(len.length<125 && x.length<700){
      description_error.innerHTML = "Description shouldn't be more than 125 words";
      description_error.classList.remove('hide');
      description.style.boxShadow="0px 0px 10px 4px red";
      description.style.borderColor="red";
      return false;
    }else{
      description_error.innerHTML = "";
      description_error.classList.add('hide');
      description.style.boxShadow="0px 0px 10px 4px green";
      description.style.borderColor="green";
      return true;
    }
  }
}


function validate_complain(){
  // console.log("It worked!");
  return  validate_name(naam) &&  validate_number(number) && validate_description(description);

}
