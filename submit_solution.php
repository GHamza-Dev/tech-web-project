<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit solution..</title>
    <link rel="stylesheet" href="styles/home-style.css">
    <link rel="stylesheet" href="styles/style_submit_sl.css">
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
                    <li><a href="challenges.html">Challenges</a></li>
                    <li><a href="solutions.html">Solutions</a></li>
                    <li><a href="login_signin.html">Login | Signin</a></li>
                </ul>
                <button class="btn-menu">
                    <span class="line"></span>
                    <span class="line l2"></span>
                    <span class="line"></span>
                </button>

            </nav>
            <div class="intro">
                <h1 class="title_">Launch countdown timer</h1>
            </div>
        </header>
        <!-- END Header -->
        <div class="wrapper">
            <form action="">
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
                        <textarea name="feedback" id="" cols="30" rows="10">Hi, you may want to ask for feedback :)</textarea>
                    </li>
                    <li>
                        <button>Submit</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <!-- Main script -->
    <script src="./scripts/index.js"></script>
</body>
</html>