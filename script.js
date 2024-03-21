const menuIcon = document.querySelector('#menuIcon');
const menu = document.querySelector('.menu');

menuIcon.addEventListener('click', () => { if(menu.style.display === "flex"){
    menu.setAttribute('style', 'display: none; animation: hideMenu 0.75s ease-in-out !important;')
    menuIcon.innerHTML = "menu";
  document.body.style.overflow = "auto";
  } else {
    menu.setAttribute('style', 'display: flex;')
    menuIcon.innerHTML = "close";
    document.body.style.overflow = "hidden";
  }
})