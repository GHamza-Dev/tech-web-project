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


/**** Show hide filter form */
filterIcon.addEventListener('click',()=>{
    filterForm.classList.toggle("show_filter_form");
});
