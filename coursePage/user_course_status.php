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

    // for counting the users in a course
    $course_id = $_SESSION["course_id"] = $_GET['course_id'];
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(DISTINCT User_Id) AS user_count FROM course_completion WHERE Course_Id = " . $course_id;
    $result = $conn->query($sql);
    $GLOBALS["user_count"] = $result->fetch_assoc()["user_count"];

    // check for users existence
    $sql = "SELECT Status FROM course_completion WHERE Course_Id = " . $course_id . " and User_Id = ".$user_id. " ORDER BY Video_Id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $GLOBALS["course_completion_status"] = [];
        while($row = mysqli_fetch_array($result))
        {
            $GLOBALS["course_completion_status"][] = $row[0];
        }
        $GLOBALS["isEnrolled"] = true;
    }
    else{
        $GLOBALS["isEnrolled"] = false;
        $GLOBALS["course_completion_status"] = array(false);
    }

    $conn->close();

    echo var_dump($_SESSION);

    // decoding json course info
    $json = file_get_contents('info.json');
    $json_data = json_decode($json,true);

    $GLOBALS["content"] = $json_data[$course_id]["content"];
    $GLOBALS["title"] = $json_data[$course_id]["course_name"];

?>