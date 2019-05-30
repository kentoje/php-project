let signinButton = document.querySelector('#signin-button');
let signingForm = document.querySelector('#signin-form');
let signinClose = document.querySelector('#signin-close');

let loginButton = document.querySelector('#login-button');
let sloginForm = document.querySelector('#login-form');
let loginClose = document.querySelector('#login-close');

signinButton.addEventListener('click', function() {
  signingForm.classList.add('visible');
  sloginForm.classList.remove('visible')
})

signinClose.addEventListener('click', function() {
  signingForm.classList.remove('visible')
})

loginButton.addEventListener('click', function() {
  sloginForm.classList.add('visible');
  signingForm.classList.remove('visible')
})

loginClose.addEventListener('click', function() {
  sloginForm.classList.remove('visible')
})
