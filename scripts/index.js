/****
 * 
 * DOM Elements
 */

const menuBtn = document.querySelector('.btn-menu');
const nav_menu = document.querySelector('.container header nav');
const filterIcon = document.querySelector('.filter_icon');
const filterForm = document.querySelector('.filter')


// Functions 

/**** Show hide menu */
menuBtn.addEventListener('click',()=>{
    menuBtn.classList.toggle('clicked-mn-btn');
    nav_menu.classList.toggle('show_menu');
});


/**** scroll event */
window.addEventListener('scroll',()=>{
    let nav  = document.querySelector('.container nav');
    if(scrollY > 25) {
        nav.classList.add('scrolling');
    }else{
        nav.classList.remove('scrolling');
    }
});

/**** Show hide filter form */
filterIcon.addEventListener('click',()=>{
    filterForm.classList.toggle("show_filter_form");
});

