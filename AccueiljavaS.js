const button_toggel= document.querySelector('.button_toggel');
     const button_menu = document.querySelector('.button_menu');
if (button_toggel && button_menu) {
  button_toggel.addEventListener('click', () => {
        button_menu.classList.toggle('open');
    });
} else {
    console.error('Required elements not found in the DOM.');
}
//-----------------using scroll animation----------------------
const MytextHTML1=document.querySelector('.ac_animation1');
 const MytextHTML2=document.querySelector('.ac_animation2');

const observer = new IntersectionObserver((entries) =>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            MytextHTML1.classList.add('visible');
             MytextHTML2.classList.add('visible');
        }else{
            MytextHTML1.classList.remove('visible');
        }
    });
});
 observer.observe(MytextHTML1, MytextHTML2);
// // the second method to do the scroll
// function isInViewport(element) {
//     const rect = element.getBoundingClientRect();
//     return (
//       rect.top >= 0 &&
//       rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
//     );
//   }
  
//   // Sélection de l'élément à animer
//   const textElement = document.querySelector('.ac_animation2');
  
//   // Ajout d'un écouteur d'événement pour détecter le défilement
//   window.addEventListener('scroll', () => {
//     if (isInViewport(textElement)) {
//       textElement.classList.add('visible'); // Ajouter la classe pour déclencher l'animation
//     }else{
//         textElement.classList.remove('visible');
//     }
//   });
