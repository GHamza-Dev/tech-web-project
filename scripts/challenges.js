import {getData} from "./requist.js";
window.onload = getData(displayChallenges,'challenges.php');


// display all challenges
function displayChallenges(list){
    const challenges = document.querySelector('.challenges');
    const len = list.length;
        // output
        let output = "";

        for(let i = 0;i<len;i++){

            //get image path
            let src = 0;

            // get languges 
            const langs_string = list[i][2].toLowerCase();
            const langs_array = langs_string.split(" ");
            let langs_html = "";
            for (let i = 0; i < langs_array.length; i++) {
                langs_html+=`
                    <li class="${langs_array[i]}">${langs_array[i]}</li>
                `
            }

            output+=`
            <div class="challenge">
                <!-- ch level -->
                <span class="ch_level ${list[i][1]}">${list[i][1]}</span>
                <!-- img of challenge -->
                <div class="img">
                    <img src="./admin/preview/desk/${list[i][7]}" alt="">
                </div>
                <div class="ch_content">
                    <!-- Languages & techs to solve ch-->
                    <ul class="langs_nad_techs">
                        ${langs_html}
                    </ul>
                    <!-- Detiales -->
                    <ch_txt>
                        <h2 class="title">${list[i][5]}</h2>
                        <p class="descreption">${list[i][4]}</p>
                    </ch_txt>
                    <!-- Solutions (nbr...)-->
                    <div class="stat">
                        <p class="stat_txt">Solutions(4)</p>
                    </div>
                    <!-- View ch -->
                    <button class="view"><a href="view_challenge.php?id=${list[i][0]}">View Challenge</a></button>
                </div>
            </div>
            `;
        }
        challenges.innerHTML = output;
}



