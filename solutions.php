<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('location:index.html');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solutions...</title>
    <link rel="stylesheet" href="styles/home-style.css">
    <link rel="stylesheet" href="styles/style_challenges.css">
    <link rel="stylesheet" href="styles/langs-and-levels.css">
    <link rel="stylesheet" href="styles/style_solutions.css">
    <link rel="stylesheet" href="styles/dev_aside_info.css">
</head>
<body>
    <div class="container">
        <!-- dev_info/menu -->
        <div class="dev_infos hide_menu">
            <span class="dev_img">
                <img src="./images/avat.svg" alt="dev name">
            </span>
            <span class="dev_name">
                <h3><?php echo $_SESSION['username']; ?></h3>
                <ul class="menu">
                    <li>
                        <?php echo '<a href="profile.php?dev_id='.$_SESSION['id'].'"><img id="profile" src="./images/dev_profile.png" alt="profile"></a>';?>
                    </li>
                    <li>
                        <a href="<?php echo 'logout.php?logout=1';?>"><img id="logout" class="logout" src="./images/logout_icon_black.png" alt="logout"></a>
                    </li>
                </ul>
            </span>
        </div>
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
                    <li class="filter_icon"><img src="./images/Filter.svg" alt="filter"></li>
                </ul>
                <button class="btn-menu">
                    <span class="line"></span>
                    <span class="line l2"></span>
                    <span class="line"></span>
                </button>
                <div class="filter">
                    <form action="" class="form_filter">
                        <ul>
                            <li>
                                <label for="keys">Keys</label>
                                <span class="keys">
                                    <img src="./images/search_icon.svg" alt="search" class="icon_search">
                                    <input type="text" name="keys" id="keys">
                                </span>                                
                            </li>
                            <li>
                                <label for="level">Level</label>
                                <select name="level" id="level">
                                    <option value="intermediate">Intermediate</option>
                                    <option value="newbe">Newbe</option>
                                    <option value="advanced">Advanced</option>
                                    <option value="junior">Junior</option>
                                    <option value="senior">Senior</option>
                                  </select>
                            </li>
                            <li>
                                <label for="langs">Languages and techs</label>
                                <select name="langs" id="langs">
                                    <option value="htmlcss">HTML&CSS</option>
                                    <option value="js">JS</option>
                                    <option value="api">API</option>
                                    <option value="cpp">C++</option>
                                    <option value="java">Java</option>
                                  </select>
                            </li>
                        </ul>
                    </form>
                </div>
            </nav>
        </header>   
        <!-- Section : challenges-->
        <section class="challenges">
            
        </section>
        <!-- END Section : challenges--> 
        <!-- Main script -->
        <script src="scripts/index.js"></script>
        <script type="module" src="scripts/solutions.js"></script>
        <script src="scripts/dev_asid_info.js"></script>
    </div>
</body>
</html>        