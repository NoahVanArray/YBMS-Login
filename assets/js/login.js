/*
	Author: John Yohan J. Navarra
*/

const wrapper = document.querySelector('.logRegForm');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=> {
	wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
	wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', ()=> {
	wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=> {
	wrapper.classList.remove('active-popup');
});


// Removes the "Email" word upon leaving that textbox
let x = document.getElementById("eMail");
if (document.getElementById("eMail") != null) { 
	x.addEventListener("onblur", myBlurFunction); 
}

function myBlurFunction() {
  document.getElementById("eMail").label.style.color = "transparent";  
}