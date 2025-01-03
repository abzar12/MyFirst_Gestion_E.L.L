const button_toggel= document.getElementById('button_toggel');
const button_menu = document.querySelector('.button_menu');

button_toggel.onclick= function(){
    button_menu.classList.toggle('open');
    button_menu.classList.add('open');
    
}