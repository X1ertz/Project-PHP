<?php
  $host='localhost';
  $DatabaseName='userinfo';
  $HoustUser='root';
  $HostPass='';
  $connect = mysqli_connect($host, $HoustUser, $HostPass, $DatabaseName) or die("Could not Connect");

  if (isset($_POST['submitname'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_query = "SELECT * FROM users WHERE username = '$username' AND password1 = '$password'";

    $result = mysqli_query($connect, $check_query);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        setcookie('id', $row['userid'], time() + 3600, '/');
        print "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=profile.php'>";
    } else {
        print"<script type='text/javascript'>alert('Username Or Password is Wrong')</script>";
        print "<meta HTTP-EQUIV='Refresh'CONTENT='0; URL=Login.php'>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Log in</title>
</head>
<body>
  <div class="container">
    <h2 class="text">Login🌻</h2>
    <form action="Login.php" method="post">
      <div>
        <h2 class="text1" for="username">Username:</h2>
        <input type="text" id="username" name="username" required>
      </div>
      <div>
        <h2 class="text1"for="password">Password:</h2>
        <input type="password" id="password" name="password"required>
      </div>
      <a class="regis"href="register.php">Don't have an account please sign up</a>
      <input type="submit" value="Login" name="submitname">
    </form>
    <footer>
    <marquee behavior="scroll" direction="left">
    <span class="marquee-text">-------------------------------- ✨FreeDiary.com✨ -------------------------------- ✨FreeDiary.com✨ -------------------------------- ✨FreeDiary.com✨ 
    --------------------------------
    </span>
  </marquee>
  </footer>
  </div>
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
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  .marquee-text {
    font-size: 24px; 
    font-weight: bold; 
    text-transform: uppercase; 
    padding: 10px;
    animation: marquee 5s linear infinite;
    text-decoration: none;
    color: azure;
}

</style>