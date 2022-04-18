// id de form validation de la page Sign Up
let formSignup = document.getElementById("formSignup");
let nameSignup = document.getElementById("nameSignup");
let prenomSignup = document.getElementById("prenomSignup");
let emailSignup = document.getElementById("emailSignup");
let passwordSignup = document.getElementById("passwordSignup");

let errorName = document.querySelector(".errorName");
let errorPrenom = document.querySelector(".errorPrenom");
let errorEmail = document.querySelector(".errorEmail");
let errorPassword = document.querySelector(".errorPassword");

// code de form validation de la page Sign Up
formSignup.addEventListener('submit', (e) =>{
  if(nameSignup.value.trim() == ''){
    e.preventDefault();
    errorName.textContent = 'name is empty';
    nameSignup.style.border = '1px solid red'
  }
  else{
    errorName.textContent = ''
    nameSignup.style.border = ''
  }

  if(prenomSignup.value.trim() == ''){
    e.preventDefault();
    errorPrenom.textContent = 'prenom is empty';
    prenomSignup.style.border = '1px solid red'
  }
  else{
    errorPrenom.textContent = ''
    prenomSignup.style.border = ''
  }

  let regexEmail =  /^[A-Za-z0-9_-]{4,10}@[a-z]{4,10}[.]{1}[a-z]{3,4}$/;
  if(emailSignup.value.trim() == ''){
    e.preventDefault();
    errorEmail.textContent = 'email is empty';
    emailSignup.style.border = '1px solid red'
  }
  else if(!regexEmail.test(emailSignup.value.trim())){
    e.preventDefault()
    errorEmail.textContent = 'Email no empty sous forme example@email.com'
    emailSignup.style.border = '1px solid red'
  }
  else{
    errorEmail.textContent = ''
    emailSignup.style.border = ''
  }

  let regexPassword = /^[A-Za-z09]{3,20}$/
  if(passwordSignup.value.trim() == ''){
    e.preventDefault();
    errorPassword.textContent = 'password is empty';
    passwordSignup.style.border = '1px solid red'
  }
  else if(!regexPassword.test(passwordSignup.value.trim())){
    e.preventDefault();
    errorPassword.textContent = "The password must contain a letter between a-z and 0-9 and must be at least 4 characters long";
    passwordSignup.style.border = '1px solid red'
  }
  else{
    errorPassword.textContent = ''
    passwordSignin.style.border = ''
  }
})

