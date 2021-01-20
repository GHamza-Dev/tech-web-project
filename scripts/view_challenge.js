
// DOM Elements

const design = document.querySelector('.design');
const mob_des = design.querySelector('.mob_design');
const desk_des = design.querySelector('.desk_design');


// Focus on mobile design
mob_des.addEventListener('mouseover',()=>{
    desk_des.classList.remove('show_des');
    mob_des.classList.add('show_des');
});

// Focus on desktop design
desk_des.addEventListener('mouseover',()=>{
    mob_des.classList.remove('show_des');
    desk_des.classList.add('show_des');
});

