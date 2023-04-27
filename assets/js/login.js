/*
	Author: John Yohan J. Navarra
*/

// LogReg Form
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


// Link popup
const lglStuff = document.querySelector('.lglStuff');
const linkPopup = document.querySelector('#link-popup');
const iconClose2 = document.querySelector('.icon-close2');

linkPopup.addEventListener('click', ()=> {
	lglStuff.classList.add('active-link');
});

iconClose2.addEventListener('click', ()=> {
	lglStuff.classList.remove('active-link');
});

