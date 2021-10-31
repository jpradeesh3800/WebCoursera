<?php
$host = 'localhost';
$uname = 'root';
$pass = '';
$db = 'web_coursera';

$con = mysqli_connect($host, $uname, $pass, $db);
 
if($con === false){
    die("Connection Failed" . mysqli_connect_error());
}

$email = $username = $password = $confirm_password = "";
$flag1 = 1;
$flag2 = 1;
$flag3 = 1;
$flag4 = 1;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
        $flag1 = 0;
        echo '<script type="text/javascript">','alert("Email is required");', 'window.location.href = "login.html"','</script>';
    }
    else{
        $sql = "SELECT id FROM users WHERE emailid = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $flag1 = 0;
                    echo '<script type="text/javascript">','alert("Email already registered");', 'window.location.href = "login.html"','</script>';
                }
                else{
                    $email = trim($_POST["email"]);
                }
            }
            else{
                echo "Signup failed";
            }
            mysqli_stmt_close($stmt);
        }
    }


    if(empty(trim($_POST["username"]))){
        $flag2 = 0;
        echo '<script type="text/javascript">','alert("Username is required");', 'window.location.href = "login.html"','</script>';
    }
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $flag2 = 0;
        echo '<script type="text/javascript">','alert("Username can only contain letters, numbers, and underscores");', 'window.location.href = "login.html"','</script>';
    }
    else{
        $sql = "SELECT id FROM users WHERE Name = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $flag2 = 0;
                    echo '<script type="text/javascript">','alert("Username already taken");', 'window.location.href = "login.html"','</script>';
                }
                else{
                    $username = trim($_POST["username"]);
                }
            }
            else{
                echo "Signup failed";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["password"]))){
        $flag3 = 0;
        echo '<script type="text/javascript">','alert("Enter a password");', 'window.location.href = "login.html"','</script>';
    }
    elseif(strlen(trim($_POST["password"])) < 8){
        $flag3 = 0;
        echo '<script type="text/javascript">','alert("Password must have atleast 8 characters");', 'window.location.href = "login.html"','</script>';
    }
    else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $flag4 = 0;
        echo '<script type="text/javascript">','alert("Password doesnt match");', 'window.location.href = "login.html"','</script>';
    }
    else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $flag4 = 0;
            echo '<script type="text/javascript">','alert("Password doesnt match");', 'window.location.href = "login.html"','</script>';
        }
    }
    if($flag1 && $flag2 && $flag3 && $flag4){
        $sql = "INSERT INTO users (Name, Password, emailid) VALUES (?, ?, ?)";
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;
            if(mysqli_stmt_execute($stmt)){
                header("location: ./login.html");
            }
            else{
                echo "Signup failed";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($con);
}
?>