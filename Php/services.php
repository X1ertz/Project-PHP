<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="service.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="member.php">Home</a></li>
                <li><a href="#">Diarys</a></li>
                <li><a href="#">Community</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="hero">
    <center><div class="main">
            <h1>Service</h1>
            <br>
            <h3>Basic (Free): Limited storage and features, suitable for casual users who want to explore the service.</h3>
            <h3>Premium ($5/month): Unlimited storage, advanced features such as customizable themes and multimedia support, ideal for dedicated diary enthusiasts.</h3>
            <h3>Pro ($10/month): All premium features plus additional perks such as priority customer support and exclusive access to new features and updates.</h3>
            <h3>Target Audience:  
            MemoRize caters to individuals of all ages who wish to document their life 
            journey, preserve precious memories, and reflect on personal growth and experiences.
            It appeals to busy professionals, students, travelers, and anyone seeking a convenient
            and secure platform to journal their thoughts and emotions.</h3></center>
    </div>

    <div class="contact-container">
        <div>

        </div>
</div>
</body>
</html>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}


.navbar {
    background-color: #9b9b9bfb;
    color: #000000;
    padding: 20px 0;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;
    padding: 0 20px;
    margin-left: 1em;
}


.nav-links {
    list-style: none;
    display: flex;
    
}

.nav-links li {
    margin-right: 20px;
    margin-left: 4em;
    border: 2px solid rgb(255, 255, 255);
    padding: 10px;
    border-radius: 30px;
}

.nav-links li a {
    text-decoration: none;
    color: #ffffff;
    font-size: 18px;
}


.hero {
    background-image: url('./pic/indexbg.jpg');
    background-size: cover;
    background-position: center;
    color: #000000;
    text-align: center;
    padding: 100px 0;
    height: 50vh;
}

.main {
    max-width: 1000px;
    background-color: white;
    padding: 15px;
    border:2px solid pink;
    border-radius:30px;
    opacity: 75%;
}

h1 {
    font-size: 48px;
    margin-bottom: 20px;
    color: gray;
}

a {
    color: #000000;
    text-decoration: none;
    font-size: 24px;
}
.main h3{
    margin-bottom:4em;
    text-align: left;
}

</style>