const menuIcon = document.querySelector('#menuIcon');
const menu = document.querySelector('.menu');

menuIcon.addEventListener('click', () => {
  if(menu.style.display === "flex"){
    menu.setAttribute('style', 'display: none; animation: hideMenu 0.75s ease-in-out;');
    menuIcon.innerHTML = "menu"
  } else {
    menu.setAttribute('style', 'display: flex; animaion: showMenu 0.75s ease-in-out;');
    menuIcon.innerHTML = "close"
  }
})