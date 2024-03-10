<?php
  $host='localhost';
  $DatabaseName='userinfo';
  $HoustUser='root';
  $HostPass='';
  $connect = mysqli_connect($host, $HoustUser, $HostPass, $DatabaseName) or die("Could not Connect");

  if(isset($_POST['submitname'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password1'];

    if($username != ""){
      $check_username_query = "SELECT * FROM users WHERE username='$username'";
      $check_username_result = mysqli_query($connect, $check_username_query);
      $count_username = mysqli_num_rows($check_username_result);
      
      if($count_username > 0){
        print"<script type='text/javascript'>alert('Username already exists. Please try a different one.')</script>";
        print "<meta HTTP-EQUIV='Refresh'CONTENT='0; URL=register.php'>";
      } else {
        $createuser = "INSERT INTO users(email,username,password1) VALUES ('$email','$username','$password')";
        mysqli_query($connect,$createuser) or die("Could not create user");
        print"<script type='text/javascript'>alert('Registration Complete')</script>";
        print "<meta HTTP-EQUIV='Refresh'CONTENT='0; URL=Login.php'>";
      }
    } else {
      print"<script type='text/javascript'>alert('Registration Not Complete. Please try again.')</script>";
      print "<meta HTTP-EQUIV='Refresh'CONTENT='0; URL=register.php'>";
    }
      
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regis.css">
    <title>Document</title>
</head>
<body>
<header>
  <a href="index.php"class="return">Return</a>
</header>
  <div class="container">

    <h2 class="text">Register🐰</h2>
    <form action="register.php" method="POST">
      <div>
        <h2 class="text1"for="email">🔴 Email:</h2>
        <input type="text" id="email" name="email" required>
      </div>
      <div>
        <h2 class="text1"for="text">🔴 Username:</h2>
        <input type="text" id="username" name="username"required>
      </div>
      <div>
        <h2 class="text1"for="password">🔴 Password:</h2>
        <input type="text" id="password" name="password" required>
      </div>
      <div>
        <h2 class="text1"for="password">🔴 RePassword:</h2>
        <input type="text" id="password1" name="password1" required>
      </div>
      <input type="submit" value="Submit" name="submitname" >
      <a class="gotologin"href="Login.php">Already have account please login</a>
    </form>
      <footer>
          <h2 class="textf">Let Enjoy With FreeDiary.com</h2>
      </footer>
</body>
</html>

<style>
  input[type="text"],
  input[type="password"],
  input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 2px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
  }
  input[type="submit"] {
    background-color: #4caf50;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 20px;
    display: inline-block;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
    transition: transform 0.6s ease;
    transform: scale(1.05);
  }
  header{
    width: 100%;
    height: 60px;
    max-width: 1920px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #333;
}
.return{
    position: fixed;
    top: 10px;
    left: 15px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #e95123; 
    color:#fff; 
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
}
.return:hover{
    background-color: rgb(255, 38, 0);
}

</style>