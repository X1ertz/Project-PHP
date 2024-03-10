<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Community Zone</title>
</head>
<body>
<div class="navbar" id="myNavbar">
    <div class="menu">
        <a href="member.php" class="active">Home</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </div>

    </a>
</div>

<center><div class="outer-box">
<?php
$host = 'localhost';
$databaseName = 'userinfo';
$hostUser = 'root';
$hostPass = '';
$conn = mysqli_connect($host, $hostUser, $hostPass, $databaseName) or die("Could not Connect");

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  

{
    $message = $_POST['message'];
    $user_id = $_COOKIE['id'];
    

    if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
        $image = $_FILES['image']['name']; 
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$image")) {
  
            $insert_post_query = "INSERT INTO posts (message, user_id, image) VALUES ('$message', '$user_id', '$image')";
            if (mysqli_query($conn, $insert_post_query)) {
                echo "New post added successfully";
            } else {
                echo "Error adding post: " . mysqli_error($conn);
            }
        } else {
            echo "";
        }
    } else {
        $insert_post_query = "INSERT INTO posts (message, user_id) VALUES ('$message', '$user_id')";
        if(mysqli_query($conn, $insert_post_query)) {
            header("Location: form.php");
            exit(); 
        } else {
            echo "Error adding post: " . mysqli_error($conn);
        }
    }
}
}



if (isset($_POST['like'])) {
    $id = mysqli_real_escape_string($conn, $_COOKIE['id']);
    $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);

    $check_like_query = mysqli_query($conn, "SELECT * FROM likes WHERE user_id = '$id' AND post_id = '$post_id'");
    if (mysqli_num_rows($check_like_query) == 0) {
        $insert_like_query = "INSERT INTO likes (user_id, post_id) VALUES ('$id', '$post_id')";
        if (mysqli_query($conn, $insert_like_query)) {
            echo "";
        } else {
            echo "Error adding like: " . mysqli_error($conn);
        }
    } else {
        $delete_like_query = "DELETE FROM likes WHERE user_id = '$id' AND post_id = '$post_id'";
        if (mysqli_query($conn, $delete_like_query)) {
            echo "";
        } else {
            echo "Error removing like: " . mysqli_error($conn);
        }
    }
}

echo "<h2 class='title'>Website Community</h2>";

$posts_query = mysqli_query($conn, "SELECT * FROM posts");
while ($post_row = mysqli_fetch_assoc($posts_query)) {
    $post_id = $post_row['post_id'];
    $message = $post_row['message'];
    $user_id = $post_row['user_id'];
    $image = $post_row['image'];
    
    $findusername_query = mysqli_query($conn, "SELECT username FROM users WHERE userid = '$user_id'");
    $user_row = mysqli_fetch_assoc($findusername_query);
    $username = $user_row['username'];
    
    $like_count_query = mysqli_query($conn, "SELECT COUNT(*) AS like_count FROM likes WHERE post_id = '$post_id'");
    $like_count_row = mysqli_fetch_assoc($like_count_query);
    $like_count = $like_count_row['like_count'];

    echo "<div class='message-box'>";
    echo "<p>$username: </p>"; 
    echo "<p>$message</p>";
    if (!empty($image)) {
        echo "<img src='uploads/$image' alt='Post Image' width=200px height=250px>";
    }
    echo "<form method='post' action='form.php'>";
    echo "<input type='hidden' name='post_id' value='$post_id'>";
    echo "<button type='submit' name='like' class='like-button'>👍🏻</button>";
    echo "<span> $like_count</span>";
    echo "</form>";
    echo "</div>";
}

?>


</div></center>


<form method="post" action="form.php" class="post-form" enctype="multipart/form-data">
    <h2>Create New Post</h2><br>
    <textarea id="message" name="message" class="message-input"></textarea><br>
    <label for="image" class="custom-file-upload">🖼️</label>
<input type="file" name="image" id="image" style="display: none;"><br>
    <br>
    <button type="submit" name="submit" class="submit-button">Post</button>
</form>

<style>
*{
    margin: 0;
}

 
  .outer-box {
    margin-top: 4em;
    background-color: #ffffff6c;
    border: 1px solid #000000;
    padding: 10px;
    max-width: 40vw;
    height: 600px;
    border-radius: 30px;
    text-align: left;
    overflow-x: hidden;
    overflow-y:visible;
}

.message-box {
    margin-right: 2em;
    width: 88%; 
    margin-top: 1em;
    text-align: left;
    background-color: #ffffff;
    border: 1px solid #ccc;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 30px;
    word-wrap: break-word;
    font-size: 18px;
    font-weight: 400;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}


  .like-button {
    margin-top: 10px;
    background-color: #f55e5e;
    border: none;
    padding: 5px ;
    cursor: pointer;
    border-radius: 50%;
    margin-left: 2em;
    font-size: 16px;
    transition: 0.5s ease;
  }
  .like-button:hover{
    background-color: #65bb3e;
  }

  .post-form {
    max-width: 750px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff6c;
    border-radius: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top:20px;
    margin-bottom:20px;
}

.message-input {
    width: 97%;
    height: 150px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: none;
    margin-bottom: 10px;
    font-size: 18px;
}

.submit-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 15px 20px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    width: 200px;
}
.title{
    text-align: center;
    font-weight: 600;
    font-size: 30px;
    color: rgb(250, 88, 88);
}
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url("./pic/chat.png");
    background-size:cover;

  }
    .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: gray; 
    color: white;
    padding: 10px 20px;
    }


.menu a {
    color: black; 
    text-decoration: none;
    margin-left: 20px;
    transition: color 0.3s; 
    font-size:19px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.menu a:hover {
    color: white; 
}

.custom-file-upload {
    display: inline-block;
    padding: 10px ;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f2f2f2;
}

.custom-file-upload:hover {
    background-color: #e0e0e0;
}

.custom-file-upload img {
    width: 10px;
    height: 10px;
    vertical-align: middle;
    margin-right: 5px;
}


::-webkit-scrollbar {
    width: 10px;

}


::-webkit-scrollbar-track {
    background: #f1f1f1; 
}


::-webkit-scrollbar-thumb {
    background: #888;
}


::-webkit-scrollbar-thumb:hover {
    background: #555;
}


</style>

<script>
  function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
      x.className += " responsive";
    } else {
      x.className = "navbar";
    }
  }
</script>
</body>
</html>
