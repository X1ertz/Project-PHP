<?php 
    if (isset($_COOKIE['id'])) header('location: member.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    
    <header>

        <div class="navbar">
            
            
            <div class ="logo">
                <a>☀FreeDiarry☀</a></div>
            <ul class="links">
                <li><a id="clicks"href="index.php">Home</a></li>
                <li><a href="Login.php">Creatediarry</a>
                <li><a href="Login.php">My diarry</a></li>
                <li><a href="Login.php">Services</a></li>
                <li><a href="Login.php">Login</a></li>

            </ul>
            <a href="register.php" class="action_btn">Register🐰</a>

            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        

        <main>
            <section id="hero"><h1>Welcom To Free Diarry Web Site</h1>
            <p class=>Let's Write Your Diarry</p></section>
        </main>

    </header>
    <style>
        .action_btn{
    background-color: rgb(248, 132, 36);
    color: azure;
    padding:  0.5rem 1rem;
    border: none;
    outline:none;
    border-radius: 15px;
    font-size:  18px;
    font-weight: bold;
    cursor: pointer;
    transition: scale 0.2 ease;


    }
    .action_btn:hover{
    scale: 1.05;
    color: rgb(255, 255, 255);
    }
    .action_btn:active{
    scale: 0.95;
    }
    *{
    margin: 0;
    padding:  0 ;
    box-sizing: border-box;
    font-family: 'Open Sans',sans-serif;
    }
        body{
        background-image: url(pic/index.gif);
        height: 100vh;
        background-color: black;
        background-size: 39%;
        background-position: center;

    }
    .navbar {
            overflow: hidden;

            padding: 10px;
        }
        .navbar .return {
            float: left; 
            display: block; 
            text-align: center; 
            padding: 10px 20px; 
            text-decoration: none; 
            border-radius: 2px;
            background-color: #ff5e00;
        }

        
    </style>

</body>
</body>
</html>