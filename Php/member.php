<?php
    $host = 'localhost';
    $DatabaseName = 'userinfo';
    $HoustUser = 'root';
    $HostPass = '';
    $connect = mysqli_connect($host, $HoustUser, $HostPass, $DatabaseName) or die("Could not Connect");

    $id = $_COOKIE['id'];

    $sql = "SELECT * FROM users WHERE userid='$id'";
    $result = $connect->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
    } else {
        echo "No user found with that username.";
    }

    $currentDateTime = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>

<div class="navbar">
    
    
    <div class ="logo">
        <a>☀FreeDiarry☀</a></div>
    <ul class="links">
        <li><a href="index.php">Home</a></li>
        <li><a href="write.php">Creatediarry</a>
        <li><a href="mydiary.php">My diarry</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="form.php">Community</a></li>
    </ul>
    <ul class="links">
    <li><a href="profile.php" class="action_btn"><?php echo $username?></a></li>
    <li><a href="logout.php" class="action_btn">logout</a></li>
    </ul>
    <div class="toggle_btn">
        <i class="fa-solid fa-bars"></i>
    </div>
</div>

<div class="dropdown_menu">
<ul>

</ul>
</div>
<main>
    <section id="hero"><h1>Welcom To Free Diarry Web Site</h1>
    <p class=>Let's Write Your Diarry</p></section>
</main>
<style>
    body{
        background-image: url(pic/index.gif);
        height: 100vh;
        background-color: black;
        background-size: 39%;
        background-position: center;

    }
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
    
</style>
</body>
</html>