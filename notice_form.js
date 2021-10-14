var title = document.getElementById('title');
var title_error = document.getElementById('title_error');
var content = document.getElementById('content');
var content_error = document.getElementById('content_error');
function validate_title(x){
  if(x.value==''){
    title_error.innerHTML = "Title must not be blank";
    title_error.classList.remove('hide');
    title.style.boxShadow="0px 0px 10px 4px red";
    title.style.borderColor="red";
    return false;
  }else{
    title_error.innerHTML = "";
    title_error.classList.add('hide');
    title.style.boxShadow="0px 0px 10px 4px green";
    title.style.borderColor="green";
    return true;

  }
}
function validate_content(x){
  if(x.value==''){
    content_error.innerHTML = "Content must not be blank";
    content_error.classList.remove('hide');
    content.style.boxShadow="0px 0px 10px 4px red";
    content.style.borderColor="red";
    return false;
  }else{
    content_error.innerHTML = "";
    content_error.classList.add('hide');
    content.style.boxShadow="0px 0px 10px 4px green";
    content.style.borderColor="green";
    return true;

  }
}
function validate_notice(){
  getLocation();
  return (validate_title(title) && validate_content(content));
}
