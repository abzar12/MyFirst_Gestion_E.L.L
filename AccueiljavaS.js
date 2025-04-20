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
 

const observer = new IntersectionObserver((entries) =>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            MytextHTML1.classList.add('visible');
           
        }else{
            MytextHTML1.classList.remove('visible');
        }
    });
});
 observer.observe(MytextHTML1);
 // the second scroll animation right=animationright and left=animation2

 const MytextHTML2=document.querySelector('.ac_animation2');
 const animationright = document.querySelector('.ac_animationright');

 const observer2 = new IntersectionObserver((entries) =>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
              MytextHTML2.classList.add('visible');
             animationright.classList.add('visible');
        }
    });
 });
 observer2.observe(MytextHTML2, animationright);

