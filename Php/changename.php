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


    if(isset($_POST['new_username'])) {
   
        $new_username = $_POST['new_username'];

        $id = $_COOKIE['id'];

     
        $sql = "UPDATE users SET username='$new_username' WHERE userid='$id'";

       
        if ($connect->query($sql) === TRUE) {
            print "<meta HTTP-EQUIV='Refresh'CONTENT='0; URL=changename.php'>";
        } else {
            echo "Error updating username: " . $connect->error;
        }
    } else {
        echo "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Username</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, rgba(224,243,250,1) 0%,rgba(216,240,252,1) 50%,rgba(184,226,246,1) 51%,rgba(182,223,253,1) 100%);
            background-size:cover;

        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            color: #666;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 24px;
        }

        input[type="submit"],
        .back-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            text-decoration:none;
        }

        input[type="submit"]:hover,
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Change Username</h2>
        <form action="changename.php" method="POST">
            <label for="">Current Username: <?php echo $username; ?></label><br>
            <label for="new_username">New Username:</label><br>
            <input type="text" id="new_username" name="new_username"><br><br>
            <input type="submit" value="Change Username"><br>
            <br>
            <a class="back-button" href="profile.php">⮪</a>
        </form>
    </div>
</body>
</html>
