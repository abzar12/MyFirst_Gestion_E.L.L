
const button_toggel=document.querySelector('.button_toggel');
const button_menu = document.querySelector('.button_menu');

if (button_menu && button_toggel) {
    button_toggel.addEventListener('click', ()=>{
        button_menu.classList.toggle('open');
    })
    
}