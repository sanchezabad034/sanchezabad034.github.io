//Aqui le estoy diciendo que de clases de mi css voy a utilizar en js
const navmenu = document.querySelector('.nav-menu');
const btnmenu = document.querySelector('.btn-menu');
const closemenu = document.querySelector('.closeMenu');

//Le estoy agregando los eventos a las clases btn-menu y close menu para mostrar y cerrar el menu
btnmenu.addEventListener('click', show);
closemenu.addEventListener('click', close);
//Aqui es lo que va a realizar cuando el boton de hamburguesa es seleccionado
function show(){
    navmenu.style.display='flex'; 
    navmenu.style.left='0'; 
}
//Cuando se cierre el boton de hamburguesa
function close(){
    navmenu.style.left='-100%'; 
}