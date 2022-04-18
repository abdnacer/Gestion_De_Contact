// id de form validation de la page Login
let formSignin = document.getElementById("formSignin");
let emailSignin = document.getElementById("emailSignin");
let passwordSignin = document.getElementById("passwordSignin");

let errorName = document.querySelector(".errorName");
let errorPrenom = document.querySelector(".errorPrenom");
let errorEmail = document.querySelector(".errorEmail");
let errorPassword = document.querySelector(".errorPassword");

// code de form validation de la page Login
formSignin.addEventListener('submit', (e) =>{
  let regexEmail =  /^[A-Za-z0-9_-]{4,10}@[a-z]{4,10}[.]{1}[a-z]{3,4}$/;
  if(emailSignin.value.trim() == ''){
    e.preventDefault();
    errorEmail.textContent = 'email is empty'
    emailSignin.style.border = '1px solid red'
  }
  else if(!regexEmail.test(emailSignin.value.trim())){
    e.preventDefault();
    errorEmail.textContent = "Email no empty sous forme example@email.com";
  }
  else{
    errorEmail.textContent = ''
    emailSignin.style.border = ''
  }
  
  let regexPassword = /^[a-z0-9A-Z]{3,20}$/;
  if(passwordSignin.value.trim() == ''){
    e.preventDefault();
    errorPassword.textContent = 'password is empty';
    passwordSignin.style.border = '1px solid red'
  }
  else if(!regexPassword.test(passwordSignin.value.trim())){
      e.preventDefault();
      errorPassword.textContent = "The password must contain a letter between a-z and 0-9 and must be at least 4 characters long";
  }
  else{
    errorPassword.textContent = ''
    passwordSignin.style.border = ''
  }
})