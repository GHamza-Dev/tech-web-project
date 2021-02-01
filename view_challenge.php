<?php

    session_start();


    require 'config/db_config.php';
    $db = new Db();
    if(isset($_GET['id'])){
        $id = $_GET['id']; // filter /!\
        $challenge = $db->getChallenges($id);
        $langs = explode(" ",strtolower($challenge[0][2]));
        $len = count($langs);      
        $db->insertDownload($id,$_SESSION['id']);
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Challenge...</title>
    <link rel="stylesheet" href="styles/home-style.css">
    <link rel="stylesheet" href="styles/langs-and-levels.css">
    <link rel="stylesheet" href="styles/view_challenge.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <nav>

                <div class="logo">
                    <!--img src="./images/logo_beta" alt="cofee"-->
                    <h1>Logo</h1>
                </div>
            
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="challenges.php">Challenges</a></li>
                    <li><a href="solutions.php">Solutions</a></li>
                </ul>
                <button class="btn-menu">
                    <span class="line"></span>
                    <span class="line l2"></span>
                    <span class="line"></span>
                </button>
            </nav>
        </header> 
        <div class="wrapper">
        <div class="l">
                <!-- ch title -->
                <h1 class="view_ch_title">
                    <?php echo $challenge[0][5]; ?>
                </h1>
                <!-- Languages & techs to solve ch-->
                <ul class="langs_nad_techs">
                    <?php for($i = 0 ; $i < $len ; $i++){
                        echo "<li class='".$langs[$i]."'>".$langs[$i]."</li>";
                    } ?>
                </ul>
                <!-- Desktop & Mobile Designe -->
                <div class="design">
                    <div class="desk_design">
                        <img src="<?php echo "./admin/preview/desk/".$challenge[0][7]; ?>" alt="desk_design">
                    </div>
                    <div class="mob_design show_des">
                        <img src="<?php echo "./admin/preview/mob/".$challenge[0][6]; ?>" alt="mob_design">
                    </div>
                </div>
            </div>
            <div class="start">
                <div class="start_download">
                    <h2>Start Challenge</h2>
                    <p class="desc">
                        <?php echo $challenge[0][4]; ?>
                    </p>
                    <button class="download">
                        <a id="download" href="<?php echo 'admin/files/'.$challenge[0][3]; ?>" download="<?php echo $challenge[0][3]; ?>">Download zip file</a>
                        <img src="./images/zip.svg" alt="download zip file">
                    </button>
                </div>
            </div>
        </div>
        <div style="margin-top: 100px;"></div>
    </div>
    <script src="scripts/index.js"></script>   
    <script src="scripts/view_challenge.js"></script>
    <script>
        document.getElementById('download').addEventListener('click',()=>{
            const params = "idChall="+<?php echo $challenge[0][0];?>+"&idDev="+<?php echo $_SESSION['id'];?>;
            let xhr = new XMLHttpRequest();
            xhr.open("POST","download.php",true);

            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            xhr.onload = function(){
                if(xhr.status === 200){
                    alert("Happy codding ;)");
                }
            }
            xhr.send(params);
        });

    </script>
</body>
</html>