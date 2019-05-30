/* API METEO */

const city = 'Paris'
const country = 'FR'
const key = 'fefe2c3f17fe5983e13d023ae5f8f965'
const url = 'http://api.openweathermap.org/data/2.5/weather'
const interval = 600000

const weather = document.querySelector('.weather')
const weatherCity = document.querySelector('.weather__city')
const weatherType = document.querySelector('.weather__type')
const weatherTemp = document.querySelector('.weather__temp')

const getWeather = () => {
  fetch( `${url}?q=${city},${country}&APPID=${key}&units=metric` )
  .then( response => {
    return response.json()
  }).then( data => {
    weatherCity.innerHTML = data.name
    weatherType.innerHTML = data.weather[0].main
    weatherTemp.innerHTML = `${data.main.temp} °C`
  } )
  .catch( error => console.log( error ) )
}

getWeather()

setInterval(() => {
  getWeather()
}, interval);

const signinButton = document.querySelector('#signin-button');
const signingForm = document.querySelector('#signin-form');
const signinClose = document.querySelector('#signin-close');

const loginButton = document.querySelector('#login-button');
const sloginForm = document.querySelector('#login-form');
const loginClose = document.querySelector('#login-close');


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