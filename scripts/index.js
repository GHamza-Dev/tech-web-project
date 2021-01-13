/****
 * 
 * DOM Elements
 */

const menuBtn = document.querySelector('.btn-menu');
const nav_menu = document.querySelector('.container header nav');




// Functions 
menuBtn.addEventListener('click',()=>{
    menuBtn.classList.toggle('clicked-mn-btn');
    nav_menu.classList.toggle('show_menu');
});