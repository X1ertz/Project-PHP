<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="write.css">
    <title>Document</title>
</head>
<body>
    <form action="writeDB.php" method="post">
    <center><h1 class="head">Typing.. Your Diarry ❤</h1></center>
        <center><select class="s1"id="daySelect" name="daySelect">
            <option value="">Day</option>
            <?php for ($day = 1; $day <= 31; $day++) { ?>
                <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
            <?php } ?>
        </select>

        <select class="s1"id="monthSelect" name="monthSelect">
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

        <select class="s1"id="yearSelect" name="yearSelect">
            <option value="">Year</option>
            <?php for ($year = date("Y"); $year >= 1900; $year--) { ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php } ?>
        </select></center>
        <br>
    <center><h2 class="inline">Topic:</h2><input class="box1"type="text"id="topic" name="topic"></center>
    <center><textarea type="text"id="userInput" name="userInput"></textarea><center>
    <diV class="checkbox">
    <h2>How You Feel Today<h2>
        <input type="checkbox" id="option1" name="option[]" value='1'>
        <label>😀</label>
        
        <input type="checkbox" id="option2" name="option[]" value='2'>
        <label>🙂</label>
        
        <input type="checkbox" id="option3" name="option[]" value='3'>
        <label>😶</label>
        
        <input type="checkbox" id="option4" name="option[]" value='4'>
        <label>😟</label>
        <br>
    <button name='submit' class="btn_sub"type="submit">Submit</button>
    <button class="btn_reset"type="reset">Clear</button><br>
    </form>
    <br>
    <a href="member.php"class="return">Return</a>
    <audio class="music" controls autoplay id="myAudio">
    <source src="your-song.mp3" type="audio/mpeg">
</audio>

<script>

    var audio = document.getElementById("myAudio");

  
    audio.volume = 0.2;
</script>


    <footer>
    </footer>
</body>
</html>

<style>
    .inline{
        display: inline;
        color:white;
    }
    input[type="text"]{
        {
    width: 100%; 
    padding: 10px; 
    margin: 5px 0; 
    border: 1px solid #ccc; 
    border-radius: 5px;
    box-sizing: border-box; 
}
    input[type="text"]:focus{
        {
    outline: none;
    border-color: red;
    box-shadow: 0 0 5px #007bff;
}
    }
    }
    #userInput {
    margin-top: 50px;
    width: 50%;
    height: 400px;
    resize: both; 
    text-align: left;
    vertical-align: top;
    font-size: 25px
    
}
.s1{
            margin-top:10px;
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
        .box1{
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
        .box1:hover{
            border-color: green;
            background-color: azure;
            transform: scale(1.05);
        }
</style>