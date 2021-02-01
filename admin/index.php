<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin || Welcome !</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../logo/logo.css">
</head>
<body>
    <div class="container">
        <!-- aside start -->
        <aside class="left">
            <nav>
                <!-- Logo -->
                <div class="logo">
                    <a href="../index.html">
                        <img id="logo" src="../logo/frontendcurve-w.svg" alt="frontendcutve.svg">
                    </a>
                </div>
                <ul class="menu">
                    <li id="btn_addchallenge">Add challenge</li>
                    <li id="challenges">Challenges</li>
                    <li id="solutions">Solutions</li>
                    <li id="devs">Devs</li>
                    <li>more</li>
                </ul>
            </nav>
        </aside>
        <!-- END Aside -->
        <!-- Display section -->
        <div class="display">
            <!-- nav -->
            <nav>
                <ul>
                    <li><h2>Gassai Hamza</h2></li>
                    <li>
                        <form class="search">
                            <label for="search"><img src="images/search_icon.svg" alt="search icon"></label>
                            <input type="search" name="search" id="search" placeholder="Srearch">
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- cards -->
            <ul class="cards">
                <li class="nbr_of_challs">
                    <p>Nbr of challenges</p>
                    <h3>152</h3>
                </li>
                <li class="nbr_of_sols">
                    <p>Nbr of solutions</p>
                    <h3>152</h3>
                </li>
                <li class="nbr_of_devs">
                    <p>Nbr of devs</p>
                    <h3>152</h3>
                </li>
            </ul>
            <h2 class="title"></h2>
            <table class="tab">
                
            </table>
        </div>
        <!-- END Display section -->
        <!-- Form add challenge -->
        <div class="wrapper_add_challenge">
            <form id="form_add_challenge" method="POST" action="insertchallenge.php" enctype = "multipart/form-data">
                <span id="close">
                    <img src="../images/close_icone.png" alt="close">
                </span>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Enter title" required>
                <label for="desc">Description</label>
                <input type="text" name="desc" id="desc" placeholder="Enter description" required>
                <label for="langs">Languages and technologies</label>
                <input type="text" name="langs" id="langs" placeholder="HTML CSS JS ..." required>
                <label for="level">Level</label>
                <select name="level" id="level">
                    <option value="newbe">Newbe</option>
                    <option value="junior">Junior</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="senior">Senior</option>
                    <option value="advanced">Advanced</option>
                </select>

                <label for="img1">Select image (Desktop preview)</label>
                <input type="file" name="img1" id="img1" required>

                <label for="img2">Select image (Mobile preview)</label>
                <input type="file" name="img2" id="img2" required>

                <label for="ui">Select file</label>
                <input type="file" name="ui" id="ui" required>
                
                <button type="submit" name="submit" id="submit_ch">Submit</button>
            </form>
        </div>
    </div>


    <!-- script -->
    <script type="module" src="index.js"></script>
    <script>
        const wrapper = document.querySelector('.wrapper_add_challenge');
        document.getElementById('btn_addchallenge').addEventListener('click',()=>{
            //wrapper.className = 'show_form';
            wrapper.classList.add('show_form');
            console.log(wrapper);
        });
        document.getElementById('close').addEventListener('click',()=>{
            wrapper.classList.remove('show_form');
        });
    </script>
</body>
</html>