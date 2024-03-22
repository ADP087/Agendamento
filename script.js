class mobileNavBar {
  constructor(menu, menuIcon){
    this.menu = document.querySelector(menu);
    this.menuIcon = document.querySelector(menuIcon);
    this.activeClass = "active";
    this.handleClick = this.handleClick.bind(this);
  }

  addClickEvent(){
    this.menuIcon.addEventListener('click', this.handleClick)
  }

  handleClick(){
    this.menu.classList.toggle(this.activeClass);
    this.handleResize()
  }

  handleResize(){
    if(this.menu.classList.contains(this.activeClass)){
      document.body.style.overflowY = "hidden";
    } else {
      document.body.style.overflowY = "auto";
    }
  }

  init(){
    if(this.menu){
      this.addClickEvent();
    }
  }
}

const mobileNav = new mobileNavBar(
  ".menu",
  ".menuIcon"
);

mobileNav.init()