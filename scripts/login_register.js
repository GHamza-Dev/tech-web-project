

/**
 * 
 * DOM Elements
 * 
 */

 const formWrapper = document.querySelector('.wrapper_login_signup');


 // Function hide form
function hideForm() {
    document.querySelector('.register').classList.toggle('hide_form');
    document.querySelector('.login').classList.toggle('hide_form');
}

// Event listeners
document.getElementById('go_to_login').addEventListener('click',hideForm);
document.getElementById('go_to_signup').addEventListener('click',hideForm);



document.getElementById('closeBtn').addEventListener('click',()=>{
    formWrapper.classList.remove('show_form_wrapper');
});


document.getElementById('ls').addEventListener('click',showFormWrapper);
document.querySelector('.btn_get_started').addEventListener('click',showFormWrapper);
// hide/show form wrapper 
function showFormWrapper() {
    formWrapper.classList.add('show_form_wrapper');
}