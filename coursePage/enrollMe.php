<?php
// Start the session
session_start();
?>

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

    $user_id = $_SESSION['user_id'];
    $course_id = $_SESSION['course_id'];
    for($i=1;$i<=15;$i++){
        echo $i;
        $sql = "INSERT INTO course_completion (User_Id,Course_Id,Video_Id,Status) VALUES ($user_id,$course_id,$i,0)";
        $result = $conn->query($sql);
        echo $result;
    }

    $conn->close();

?>