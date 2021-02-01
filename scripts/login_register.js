

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


// register new dev

function registerDev() {
    let fname = document.getElementById('fname').value;
    let lname = document.getElementById('lname').value;
    let github = document.getElementById('github').value;
    let pass = document.getElementById('pass').value;

    const params = "fname="+fname+"&lname="+lname+"&github="+github+"&pass="+pass+"&submitreg=1";
    let xhr = new XMLHttpRequest();
        xhr.open("POST","dev_register.php",true);

        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

        xhr.onload = function(){
            if(xhr.status === 200){
                alert(xhr.response);
            }
        }
        xhr.send(params);
}

document.getElementById('submit').addEventListener('click',(e)=>{
    e.preventDefault();
    registerDev();
});


// login dev (/!\)

function loginDev() {
    let username = document.getElementById('username').value;
    let loginpass = document.getElementById('lpass').value;
    

    const params = "username="+username+"&loginpass="+loginpass+"&login=1";
    let xhr = new XMLHttpRequest();
        xhr.open("POST","dev_register.php",true);

        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

        xhr.onload = function(){
            if(xhr.status === 200){
                window.location = "challenges.php";
            }else alert(xhr.response);
        }
        xhr.send(params);
}

document.getElementById('submit_Login').addEventListener('click',(e)=>{
    e.preventDefault();
    loginDev();
});