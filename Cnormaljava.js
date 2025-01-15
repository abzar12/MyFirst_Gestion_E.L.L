// _________________________debut de button toggle_______________
const button_toggel=document.querySelector('.button_toggel');
const button_menu = document.querySelector('.button_menu');

if (button_menu && button_toggel) {
    button_toggel.addEventListener('click', ()=>{
        button_menu.classList.toggle('open');
    });
    
};
// _________________________fin de button toggle_______________

// ------------------debut de card----------------------
const anim1 = document.querySelector('.ac_card_body');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry=>{
        if(entry.isIntersecting){
            anim1.classList.add('anim1');
        }
    });
});
observer.observe(anim1);
// _________________________fin de card_______________
// ------------------debut de la formulaire----------------------

let currentpart = 0;

function showpart(partIndex) {
    const parts = document.querySelectorAll('.part2');
    parts.forEach((part, index) => {
        part.classList.toggle('active', index === partIndex);
    });
}

function nextStep() {
    const parts = document.querySelectorAll('.part2');
    const currentFields = parts[currentpart].querySelectorAll('input, select, textarea');

    // Vérifier si tous les champs requis sont valides
    let isValid = true;
    currentFields.forEach((field) => {
        if (!field.checkValidity()) {
            isValid = false;
            field.reportValidity(); // Affiche le message d'erreur du navigateur
        }
    });

    // Si tous les champs sont valides, passer à l'étape suivante
    if (isValid && currentpart < parts.length - 1) {
        currentpart++;
        showpart(currentpart);
    }
}

function prevStep() {
    if (currentpart > 0) {
        currentpart--;
        showpart(currentpart);
    }
};
// _________________________fin de la formulaire_______________
