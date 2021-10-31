<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="course_page.css">
    <title>HTML</title>
</head>
<script src = "course_page.js"></script>
<body>

    <?php $GLOBALS['course_id'] = $_GET['course_id']; require "user_course_status.php"; ?>

    <div class="dropdown">
        <button class="dropbtn"><div class = "menu"></div><div class = "menu"></div><div class = "menu"></div></button>
        <div class="dropdown-content">
          <a href="../homePage/home.php">Home</a>
          <a href="../login.html">Logout</a>
          <a href="../privacypolicy.html">About</a>
        </div>
      </div>
      <div class = "mainheading"><?php echo $GLOBALS["title"]; ?></div><br>
      <script>
            function enrollMe(){
                var xhttp = new XMLHttpRequest(); 
                xhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) { 
                        window.location.reload();
                    }

                };
                xhttp.open("GET", "enrollMe.php", true);
                xhttp.send();
                
            }
            
        </script>
        <script>
            function toggleMe(e){
                var xhttp = new XMLHttpRequest(); 
                xhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200 && this.responseText.trim()=="1") { 
                        console.log(this.responseText);
                        alert("Congratulations! You have Completed the Course Successfully.");
                        window.location.reload();
                    }

                };
                xhttp.open("GET", "toggleMe.php?video_id="+e.value+"&status="+e.checked, true);
                xhttp.send();
            }
        </script>



<?php  if(!$GLOBALS["isEnrolled"]) echo "<button class = 'blocks11' style='background-color: #45b29c; color: white;' onclick='enrollMe()'>Enroll Me</button>"; ?>
      <span class = "blocks11">Total No. of Registered Users: </span><span class = "blocks11" id="user_count"><?php echo $GLOBALS["user_count"];  ?></span>
     <div class = "blocks">
        <h2 class = "headings">Videos</h2>
        <div id="myBtnContainer">
            <button class="btn active" onclick="filterSelection('all')"> Show all</button>
            <button class="btn" onclick="filterSelection('short')"> Short Videos</button>
            <button class="btn" onclick="filterSelection('medium')"> Medium Videos</button>
            <button class="btn" onclick="filterSelection('long')"> Long Videos</button>
            <button class="btn" onclick="filterSelection('clear')"> Clear</button>
        </div>
        <br>
        <div class="container">
            <?php require "load_videos.php" ?>
      </div>
    </div>  
    <br>
    <div class = "blocks">
    <h2 class = "headings">Audio files</h2>
    <div id="myBtnContainer"> 
        <button class="btn active" onclick="filterSelection('All')"> Show all</button>
        <button class="btn" onclick="filterSelection('Short')"> Short Audios</button>
        <button class="btn" onclick="filterSelection('Medium')"> Medium Audios</button>
        <button class="btn" onclick="filterSelection('Long')"> Long Audios</button>
        <button class="btn" onclick="filterSelection('Clear')"> Clear</button>
    </div>
    <br>

    <div class="container">
        <?php require "load_audios.php"; ?>
    </div>
    </div>
<div class = "blocks">
    <h2 class = "headings">Books and Web references</h2>
    <div>
        <?php require "load_references.php"; ?>
    </div>
</div>
</body>
</html>