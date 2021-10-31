<!DOCTYPE html>
<html>
<head></head>

<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_coursera";

    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $course_id = 20;

    $sql = "SELECT COUNT(DISTINCT User_Id) AS user_count FROM course_completion WHERE Course_Id = " . $course_id;
    $result = $conn->query($sql);


    $row = $result->fetch_assoc();
    echo $row["user_count"];
    $conn->close();


?>
</body>

</html>