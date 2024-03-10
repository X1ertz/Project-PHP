<?php 
    $host='localhost';
    $DatabaseName='userinfo';
    $HoustUser='root';
    $HostPass='';
    $conn = mysqli_connect($host, $HoustUser, $HostPass, $DatabaseName) or die("Could not Connect");

    $id = $_COOKIE['id'];
    $check = mysqli_query($conn ,"SELECT * FROM diarrys WHERE userid='$id'");

    if (isset($_POST['submitD'])) {
        if(isset($_POST['delete_id'])) {
            
            $delete_ids = $_POST['delete_id'];
    
            
            foreach($delete_ids as $id) {
                
                $sql = "DELETE FROM diarrys WHERE id='$id'";
    
                
                if (mysqli_query($conn, $sql)) {
                    header("Location: mydiary.php");
                    exit;
                } else {
                    echo "เกิดข้อผิดพลาดในการลบข้อมูล ID $id: " . mysqli_error($conn) . "<br>";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diary.css">
    <title>Document</title>
</head>
<body>
    <div class="navbar">
    <a class="return"href="member.php">Return</a>
    <a class="create"href="write.php">➕</a>
    </div>

  
    <?php 
        if (mysqli_num_rows($check) > 0) {
            while ($row = mysqli_fetch_assoc($check)) { 
        
    ?>
     <br>
        <div class="box">
            <form action="mydiary.php" method="post">
                <table border='1'>
                    <tr>
                        <td> Topic : </td>
                        <td> <?php echo $row['topic'] ?></td>
                    </tr>
                    <tr>
                        <td> diarry : </td>
                        <td> <?php $diaryText = $row['diarry'];
                        $textLength = strlen($diaryText);
                        $maxCharsPerLine = 200;
                        $formattedDiary = wordwrap($diaryText, $maxCharsPerLine, "<br>", true);
                        echo $formattedDiary; ?></td>
                    </tr>
                    <tr>
                        <td> Emote : </td>
                        <td> <?php echo $row['emoji'] ?> </td>
                    </tr>
                    <tr>
                        <td> date : </td>
                        <td> <?php echo $row['create_date'] ?> </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" name="delete_id[]" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="submitD" value="ลบข้อมูล">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php 
        } 
    } 
    ?>
</body>
</html>

<style>
    table {
    background-color: #f0f0f0;
    border: 1px solid #ccc; 
    border-radius: 5px; 
    padding: 20px;
    margin: 10px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    color: black;
    font-weight: bold;
    align: left;
    }
    
    .sub{
    background-color: rgb(255, 0, 0);
    color: white;
    padding:  0.5rem 1rem;
    border: none;
    outline:none;
    border-radius: 15px;
    font-size:  18px;
    font-weight: bold;
    cursor: pointer;
    transition: scale 0.2 ease;
    }

        .container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 4fr));
        gap: 20px;
}

/* diary.css */
.navbar {
    background-color: #333;
    color: white;
    padding: 10px;
}

.box {
    margin-top: 20px;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 10px;
    width: 90%;
    margin-left:5%;
}

.box table {
    width: 100%;
    border-collapse: collapse;
}

.box table td {
    padding: 10px;
    border: 1px solid #ddd;
}

.box table td:first-child {
    width: 100px;
    font-weight: bold;
}

</style>