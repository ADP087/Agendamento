const menuHamb = document.getElementById("menu-button");
const menu = document.getElementById("menu");

menuHamb.addEventListener("click", () => {
    if (menu.style.display === "none") {
        menu.style.display = "flex";
    }
    else {
        menu.style.display = "none";
    }
});

