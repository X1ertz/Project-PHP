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
        $email = $row['email'];
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
    <title>Document</title>
    
</head>
<center><body>
    <div class="container">
    </div>
        <div class="box">
            <p>User Status</p>
            <div align="left">UserId: <?php echo $id; ?></div>
            <br>
            <div align="left">Username: <?php echo $username; ?></div>
            <br>
            <div align="left">Email: <?php echo $email; ?></div>
            <br>
            <div align="left">Status: 🟢</div>
            <br>
            <div align="left">Time/Date: <?php echo $currentDateTime; ?></div>
            <br>
            <br>
        </div>
    </div>
    <a href="changename.php" class="button">Change</a><br>
    <a href="member.php" class="button">Home</a>
</body></center>
</html>

<style>
    .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            
    }
    .box {
        width: 400px;
        height: 350px;
        background-color: #F5F5F5;
        border: 2px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top:150px;
        outline-style: inset;
        color:#000000;
        font-weight: bold;
        font-size:20px;

    }


    .box p {
    font-family: Arial, sans-serif;
    font-size: 28px;
    line-height: 1.5;
    font-weight: bold;
    color: #000000;
    }


    .box h2 {
    font-family: Arial, sans-serif;
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
    }
    .button {
        font-family: Arial, sans-serif;
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top:30px;
    width: 150px;
    height: 30px;
    font-size: 28px;
    }

    .button:hover {
    background-color: #0056b3;
    } 
</style>