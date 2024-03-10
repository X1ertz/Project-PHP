<?php
$host = 'localhost';
$databaseName = 'userinfo';
$hostUser = 'root';
$hostPass = '';
$conn = mysqli_connect($host, $hostUser, $hostPass, $databaseName) or die("Could not Connect");
$id = $_COOKIE['id'];
if (isset($_POST['subup'])) {
    $diarry = $_POST['diarry'];
    $id = $_POST['id'];
    $topic = $_POST['topic'];
    $date = $_POST['d'] . '/' . $_POST['m'] . '/' . $_POST['y'];
    $sql = "UPDATE diarrys SET diarry='$diarry', topic='$topic', create_date='$date' WHERE id='$id'";

 
    if (mysqli_query($conn, $sql)) {

        header("location: mydiary.php");
        exit;
    } else {

        echo "เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="update.php" method="post"onsubmit="return validateForm()">
<script>
    function validateForm() {
        var id = document.getElementById("up").value;
        if (id == "") {
            alert("Please Enter Id for Update");
            return false;
        }else if (isNaN(id)) {
        alert("Please Enter a Numeric ID");
        return false;
        }
        
        return true;
    }
    
</script>
    <div class="navbar">
    <a class="return"href="mydiary.php">Return</a>
    </div>
<center><select class="s1"id="d" name="d">
            <option value="">Day</option>
            <?php for ($day = 1; $day <= 31; $day++) { ?>
                <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
            <?php } ?>
        </select>

        <select class="s1"id="m" name="m">
            <option value="">Month</option>
            <?php
            $months = array(
                "January", "February", "March", "April", "May", "June", "July",
                "August", "September", "October", "November", "December"
            );
            foreach ($months as $index => $month) {
                $monthNum = $index + 1;
                ?>
                <option value="<?php echo $monthNum; ?>"><?php echo $month; ?></option>
            <?php } ?>
        </select>

        <select class="s1"id="y" name="y">
            <option value="">Year</option>
            <?php for ($year = date("Y"); $year >= 1900; $year--) { ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php } ?>
        
        </select>
        <br>
                <div>
                <br>
                <h3 class="line">ID:</h3><input class="inline"type="text" name="id" id="up"><br>
                <br>
                <h3 class="line">Topic:</h3><input class="inline"type="text" name="topic"><br>
                <br>
                </div>
                <textarea id="diarry"name="diarry" cols="30" rows="10"></textarea><br>
                <br>
                <input name="subup"class="sub" type="submit" value="Save">
            </form>
            </center>
        <style>
            *{
            margin: 0;
            padding:  0 ;
            box-sizing: border-box;
            font-family: 'Open Sans',sans-serif;
            }
            body{
            height: 100vh;
            background-color: black;
            background-image: url(pic/bible.jpg);
            background-size: cover;
            background-position: center;
            }
            #diarry {
            margin-top: 50px;
            width: 40%;
            height: 400px;
            resize: both; 
            text-align: left;
            vertical-align: top;
            font-size: 25px 
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
            transition: transform 0.5s;
        }
        .sub:hover{
            background-color:green;
            transform: scale(1.1);
        }
        textarea {
            width: 300px; 
            height: 100px; 
            padding: 10px; 
            font-size: 16px; 
            border: 2px solid red; 
            border-radius: 5px;
            resize: none; 
            background-color: #FFCCCC;
            transition: border-color 0.6s;
            transition: background-color 0.6s;
            transition: transform 0.8s;
        }
        textarea:hover{
            border-color: green;
            background-color: azure;
            transform: scale(1.01);
        }
        textarea:focus {
            border-color: green;
        }
        .s1{
            margin-top:50px;
            width: 200px;
            padding: 7px;
            font-size: 14px;
            border: 2px solid red;
            border-radius: 5px;
            appearance: none; 
            cursor: pointer; 
            transition: transform 0.8s;
            transition: border-color 0.6s;
            transition: background-color 0.6s;
            background-color: #FFCCCC;
        }
        .s1:focus{
            border-color: green;
            padding: 10px 20px; 
            border-radius: 5px;  
            transform: scale(1.05);

        }
        .s1:hover{
            border-color: green;
            background-color: azure;
            transform: scale(1.05);
        }
        select option:checked {
            background-color: #007bff; 
            color: white; 
            border-color: green;
        }
        .navbar {
            overflow: hidden;
            background-color: #333; 
            padding: 10px;
        }
        .navbar .return {
            float: left; 
            display: block; 
            color: #f2f2f2; 
            text-align: center; 
            padding: 10px 20px; 
            text-decoration: none; 
            border-radius: 2px;
            background-color: #ff5e00;
        }

  
        .navbar a:hover {
            background-color: #ddd; 
            color: black; 
        }
        .inline{
            display: inline-block;
            background-color: #FFCCCC;
            border: 1px solid red; 
            border-radius: 5px; 
            padding: 5px;
            margin: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            color: black;
            transition: transform 0.8s;
        }
        .inline:hover{
            border-color: green;
            background-color: azure;
            transform: scale(1.05);
        }
        .line{
            display:inline;
            color:azure;
            font-weight:bold;
            outline:3px;
            outline-color: black;
            box-shadow: 0 0 5px rgba(0, 0, 0, 5);
        }
        </style>
</body>
</html>