<?php 
    $id = $_COOKIE['id'];
    $date = $_POST['daySelect'] . '/' . $_POST['monthSelect'] . '/' . $_POST['yearSelect'];
    $text = $_POST['userInput'];
    $topic= $_POST['topic'];
    $checkemo = '';


    if (isset($_POST['option'])) {
        $option = $_POST['option'];
        foreach ($option as $op) {
            switch ($op) {
                case "1":
                    $checkemo .= '😀';
                    break;
                case "2":
                    $checkemo .= '🙂';
                    break;
                case "3":
                    $checkemo .= '😶';
                    break;
                case "4":
                    $checkemo .= '😟';
                    break;
            }
        }
    }

    $host='localhost';
    $DatabaseName='userinfo';
    $HoustUser='root';
    $HostPass='';
    $conn = mysqli_connect($host, $HoustUser, $HostPass, $DatabaseName) or die("Could not Connect");
    $checkuser = mysqli_query($conn ,"INSERT INTO diarrys(userid, diarry, emoji, create_date, topic)
                VALUES ('$id', '$text', '$checkemo', '$date', '$topic')");

    header('location: member.php');
?>