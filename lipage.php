<?php
session_start();
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: ./homePage/home.php");
//     echo
//     exit;
// }

$host = 'localhost';
$uname = 'root';
$pass = '';
$db = 'web_coursera';

$con = mysqli_connect($host, $uname, $pass, $db);
 
if($con === false){
    die("Connection Failed" . mysqli_connect_error());
}

$username = $password = "";
$flag1 = 1;
$flag2 = 1;
$flag3 = 1;
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $flag1 = 0;
        echo '<script type="text/javascript">','alert("Username required");', 'window.location.href = "login.html"','</script>';
    }
    else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $flag2 = 0;
        echo '<script type="text/javascript">','alert("Password required");', 'window.location.href = "login.html"','</script>';
    }
    else{
        $password = trim($_POST["password"]);
    }
    
    if($flag1 && $flag2){
        $sql = "SELECT id, Name, Password FROM users WHERE Name = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $id;
                            $_SESSION["username"] = $username;  
                            echo var_dump($_SESSION);                          
                            header("location: ./homePage/home.php");
                        }
                        else{
                            $flag3 = 0;
                            echo '<script type="text/javascript">','alert("Invalid username or password.");', 'window.location.href = "login.html"','</script>';
                        }
                    }
                }
                else{
                    $flag3 = 0;
                    echo '<script type="text/javascript">','alert("Invalid username or password.");', 'window.location.href = "login.html"','</script>';
                }
            }
            else{
                echo "Login Failed";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($con);
}
?>