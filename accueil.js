const button_toggel= document.getElementById('button_toggel');
const button_menu = document.querySelector('.button_menu');

button_toggel.addEventListener('click', ()=>{

    button_menu.classList.toggle('open');

})