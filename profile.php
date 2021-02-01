<?php
    session_start();
    require 'config/db_config.php';
    $db = new Db();
     
    // get infos
    if(isset($_GET['dev_id'])){
        // dev infos
        $id = $_SESSION['id'];
        $infos = $db->profileDev($id);
        $sols = $db->nbrSolutionDevx($id)[0];

        // downloaded challenges
        $todo = $db->downloadedChallenges($id);
        
        $langs = explode(" ",strtolower($todo[0][2]));
        $len = count($langs); 
        
        $lis = "";
        for($i = 0 ; $i < $len ; $i++)
            $lis.="<li class='".$langs[$i]."'>".$langs[$i]."</li>";
    }  

    //submit solution
    if (isset($_GET['submitSol'])) {
        if($db->addSolution($_GET['solutionId'],$_SESSION['id'],$_GET['github'],$_GET['demo'],$_GET['feedback'],$_GET['langs'])){
            deleteDownload($id_chall,$id_dev);
            echo "<script>alert('Solution added successfully :)')</script>";
            header('location:solutions.php');
        }
    }

    
    




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile || <?php echo $infos[0][2]." ".$infos[0][1]; ?></title>
    <link rel="stylesheet" href="styles/home-style.css">
    <link rel="stylesheet" href="styles/style_profile.css">
    <link rel="stylesheet" href="styles/langs-and-levels.css">
    <link rel="stylesheet" href="styles/style_submit_sl.css">
    <link rel="stylesheet" href="logo/logo.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <nav>

                <!-- Logo -->
                <div class="logo">
                    <a href="index.html">
                        <img id="logo" src="./logo/frontendcurve-w.svg" alt="frontendcutve.svg">
                    </a>
                </div>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="challenges.php">Challenges</a></li>
                    <li><a href="solutions.php">Solutions</a></li>
                    <li><a href="<?php echo 'logout.php?logout=1'?>">Logout | <?php echo $infos[0][1]; ?></a></li>
                </ul>
                <button class="btn-menu">
                    <span class="line"></span>
                    <span class="line l2"></span>
                    <span class="line"></span>
                </button>

            </nav>
        </header>
        <!-- END Header -->
        <!-- View Dev info-->
        <div class="dev">
            <div class="dev_bio">
                <div class="dev_bio_img">
                    <img src="./images/avat.svg" alt="dev name">
                </div>
                <div class="dev_bio_txt">
                    <h1><?php echo $infos[0][2]." ".$infos[0][1]; ?></h1>
                    <h2>@<?php echo $infos[0][1]; ?></h2>
                    <h3>
                        <img class="location" src="./images/location.png" alt="countery">
                        <span class="countery_name"><?php echo $infos[0][5];?></span>
                    </h3>
                    <p class="about">Hi,I'm <?php echo $infos[0][1];?> thank you for visiting my profile.</p>
                </div>
            </div>
            <div class="dev_statistic">
                <h2>
                    SOLUTIONS 
                    <span class="nbr_of_solutions"><?php echo $sols; ?></span>
                </h2>
                <h2>SCORE 
                    <span class="scroe">182</span>
                </h2>
                <div class="github_account">
                    <a href="<?php echo $infos[0][3];?>" target="_blank">
                        <img src="images/github.svg" alt="www.github.com/name">
                    </a>
                </div>
            </div>
        </div>
        <!-- END Dev -->
        <!-- Menu -->
        <ul class="menu">
            <li class="dev_solutions">Todo</li>
            <li id="submit_solution">My solutions</li>
        </ul>
        <!-- dones -->
        <section class="solutions_">
            <?php
                for($i = 0; $i<count($todo); $i++){
                    echo '
                    <div class="done '.$todo[$i][3].'">
                        <h3 class="title">'.$todo[$i][1].'</h3>
                        <ul class="langs_nad_techs">
                          '.$lis.'  
                        </ul>
                        <button class="btn_submit_solution" value="'.$todo[$i][0].'">Submit solution</button>
                    </div>';
                }
            
            
            ?>
        </section>
        <!-- Submit solution  -->
        <div class="shadow">
            <button id="close">
                X
            </button>
        </div>
        <div class="wrapper">
            <form action="profile.php" method="GET">
                <ul>
                    <li>
                        <label for="langs">Languages and techs</label>
                        <input type="text" name="langs" id="langs" placeholder="HTML,CSS,JS...">
                    </li>
                    <li>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter title">
                    </li>
                    <li>
                        <label for="github">GitHub link</label>
                        <input type="url" name="github" id="github" placeholder="Enter github link">
                    </li>
                    <li>
                        <label for="demo">Demo link <a href="#">?</a></label>
                        <input type="url" name="demo" id="demo" placeholder="Enter link to the demo">
                    </li>
                    <li>
                        <label for="feedback">Ask for feedback</label>
                        <textarea name="feedback" id="t" cols="30" rows="8">Hi, you may want to ask for feedback :)</textarea>
                    </li>
                    <li>
                        <input id="id_chall" style="visibility:hidden;width:0;height:0;overflow:hidden;" value="" type="text" name="solutionId">
                    </li>
                    <li>
                        <button type="submit" name="submitSol">Submit</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    </div>
    <!-- Main script -->
    <script src="./scripts/index.js"></script>
    <script>
        /*
        *
        * Elements
        */

        const shadow = document.querySelector('.shadow');
        const wrapper = document.querySelector('.wrapper');
    
        document.getElementById('close').addEventListener('click',()=>{
            wrapper.classList.remove('show_form');
            shadow.classList.remove('show_form');
        });


        const btn = document.querySelectorAll('.btn_submit_solution');
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click',()=>{
                wrapper.classList.add('show_form');
                shadow.classList.add('show_form');
                document.getElementById('id_chall').value = btn[i].value;
            });
        }
    </script>
</body>
</html>