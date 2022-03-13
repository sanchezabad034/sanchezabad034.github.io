const btnmenu= document.querySelector("btn-menu");
const menu= document.querySelector("nav-menu");

btnmenu.addEventListener("click", ()=>{
    menu.classList.toggle("nav-menu_visible");
});