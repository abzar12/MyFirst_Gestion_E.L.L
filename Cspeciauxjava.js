// _________________________debut de button toggle_______________
const button_toggel=document.querySelector('.button_toggel');
const button_menu = document.querySelector('.button_menu');

if (button_menu && button_toggel) {
    button_toggel.addEventListener('click', ()=>{
        button_menu.classList.toggle('open');
    });
    
};
const anim1 = document.querySelector('.ac_head');
const observer= new IntersectionObserver((entries) =>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            anim1.classList.add('anim1');
        }
    });
})
observer.observe(anim1);
// _________________________fin de button toggle_______________
AOS.init({
    duration: 1000, // Durée de l'animation en millisecondes
    easing: 'ease-in', // Type de transition
    once: true, // Animation uniquement au premier scroll
});