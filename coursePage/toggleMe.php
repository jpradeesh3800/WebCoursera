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
    $video_id = $_GET['video_id'];
    $status = $_GET['status'];

    $sql = "UPDATE course_completion SET Status=$status WHERE User_Id=$user_id AND Course_Id=$course_id AND Video_Id=$video_id";
    $result = $conn->query($sql);

    $sql = "SELECT SUM(Status)=15 AS isCompleted FROM course_completion WHERE User_Id = $user_id AND Course_Id = $course_id";
    $result = $conn->query($sql);
    if($result->fetch_assoc()['isCompleted']){
        $sql = "DELETE FROM course_completion WHERE User_Id = $user_id AND Course_Id = $course_id";
        $result = $conn->query($sql);
        echo "1";
    }
    $conn->close();

?>