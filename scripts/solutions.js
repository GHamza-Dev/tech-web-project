import {getData} from "./requist.js";
window.onload = getData(displaySolutions,'sollutions.php');


// display all solutions
function displaySolutions(list){
    console.log(list);
    const solutions = document.querySelector('.challenges');
    const len = list.length;
        // output
        let output = "";

        for(let i = 0;i<len;i++){

            //get images path
            let solution_src = 0;
            let dev_img = 0;

            // get languges 
            const langs_string = list[i][7].toLowerCase();
            const langs_array = langs_string.split(" ");
            let langs_html = "";
            for (let i = 0; i < langs_array.length; i++) {
                langs_html+=`
                    <li class="${langs_array[i]}">${langs_array[i]}</li>
                `
            }

            output+=`
            <!-- Challenge -->
            <div class="challenge">
                <!-- img of challenge -->
                <div class="img">
                    <img src="./images/test_img.jpg" alt="">
                </div>
                <div class="ch_content">
                    <!-- Languages & techs to solve ch-->
                    <ul class="langs_nad_techs">
                        ${langs_html}
                    </ul>
                    <!-- Detiales -->
                    <ch_txt>
                        <h2 class="title">${list[i][6]}</h2>
                        <p class="descreption">${list[i][4]}</p>
                    </ch_txt>
                    <!-- Solution by -->
                    <div class="made_by">
                        <div class="dev_info">
                            <img src="./images/dev_profile_test.png" alt="dev_profile" class="dev_profile">
                            <div class="dev_info_txt">
                                <h3 class="name">${list[i][0]} ${list[i][1]}</h3>
                                <div class="score">${list[i][8]}</div>
                            </div>
                        </div>
                        <div class="react">
                            <img src="./images/heart.png" alt="like" class="like">
                        </div>
                    </div>
                    <!-- View ch -->
                    <button class="view view_icons">
                        <a class="github_link${i}" href"${list[i][2]}"><img src="images/github.svg" alt="github icon"></a>
                        <a href"${list[i][3]}"><img src="images/eye.svg" alt="eye icone"></a>
                    </button>
                </div>
            </div>
            `;
            //solutions.querySelector('github_link'+i).setAttribute(href,`${list[i][2]}`);
        }
        solutions.innerHTML = output;
}



