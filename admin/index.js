
import {getData} from '../scripts/requist.js';



/*
*
* DOM Elements
*
*
*/
const table = document.querySelector('.tab');
const title = document.querySelector('.title');





/*
*
* Functions
*
*/

// display solutions
function displaySolutions(data) {
    let output = `<tr>
        <th>#</th>
        <th>Title</th>
        <th>languages & techs</th>
        <th>Level</th>
        <th>Description</th>
        <th>Code</th>
        <th>Demo</th>
        </tr>`;
    let i = 1;
        data.forEach(item => {
            output+=`
                <tr>
                    <td>${i}</td>
                    <td>${item[6]}</td>
                    <td>${item[7]}</td>
                    <td>${item[5]}</td>
                    <td>${item[4]}</td>
                    <td><a href="${item[2]}">visit</a></td>
                    <td><a href="${item[3]}">visit</a></td>
                 </tr>            
            `;
            i++;
        });  
        title.innerHTML="Solutions";           
        table.innerHTML = output;    
}


// display challenges
function displayChallenges(data) {
    let output = `<tr>
        <th>#</th>
        <th>Title</th>
        <th>languages & techs</th>
        <th>Level</th>
        <th>Description</th>
        <th>Nbr of solutions</th>
        <th>Visit link</th>
        </tr>`;

        data.forEach(item => {
            output+=`
                <tr>
                    <td>${item[0]}</td>
                    <td>${item[5]}</td>
                    <td>${item[2]}</td>
                    <td>${item[1]}</td>
                    <td>${item[4]}</td>
                    <td>----</td>
                    <td><a href="#">Visit</a></td>
                 </tr>            
            `;
        }); 
        
        title.innerHTML="Challenges";           
        table.innerHTML = output;    
}


// display devs

function displayDevs(list){
    let output = `<tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Countery</th>
        <th>Github</th>
        <th>Score</th>
        <th>nbr of sols</th>
        <th>Image</th>
        </tr>`;

    list.forEach(item => {
        output+=`
            <tr>
                <td>${item[0]}</td>
                <td>${item[1]}</td>
                <td>${item[2]}</td>
                <td><a href="${item[3]}">Github</a></td>
                <td>${item[4]}</td>
                <td>${item[7]}</td>
                <td><img src="../images/avat.svg" alt="gh"></td>
             </tr>            
        `;
    });

    title.innerHTML="Developers";           
    table.innerHTML = output;
}


// Display statistics
function displayStats(data) {

    document.querySelector('.nbr_of_challs h3').innerHTML = data[0];
    document.querySelector('.nbr_of_sols h3').innerHTML = data[1];
    document.querySelector('.nbr_of_devs h3').innerHTML = data[2];
}

/** Event listeners */

window.onload = getData(displayStats,'stats.php');

document.querySelector('#devs').addEventListener('click',()=>{
    getData(displayDevs,'devs.php');
});

document.querySelector('#challenges').addEventListener('click',()=>{
    getData(displayChallenges,'challenges.php');
});



document.querySelector('#solutions').addEventListener('click',()=>{
    getData(displaySolutions,'solutions.php');
});