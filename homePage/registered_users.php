<!DOCTYPE html>
<html>
<head>


<style>
body{
    padding-left: 20px;
    margin: 10px;
  }
.mainheading{
  display: table;
  margin: 0px auto 0px auto;
  padding:5px;
  font-size:40px;
  background-color: #45b29c;
  color:#ffffff;
  cursor: default;
}
#tables {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#tables td, #tables th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tables tr:nth-child(even){background-color: #f2f2f2;}

#tables tr:hover {background-color: #ddd;}

#tables th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #45b29c;
  color: white;
}
</style>
</style>
</head>

<body>
<h1 class="mainheading">Registered Users in Web Coursera</h1>  
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
    
    $sql = "SELECT name,emailid FROM users";
    $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //       echo "Name: " . $row["name"]. " - Email ID: " . $row["emailid"]. "<br>";
    //     }
    //   } else {
    //     echo "0 results";
    //   }
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<br><br><table id='tables'>  <tr>
        <th>SNo.</th>
        <th>Name</th>
        <th>Email Id</th>
      </tr>
      <tr>";
      $i=1;
        while($row = $result->fetch_assoc()) {
          $name = $row["name"];
          $email = $row["emailid"];
          echo "<tr><td>".$i."</td><td>".$name."</td><td>".$email."</td>";
          $i++;
        }
        echo "</table>";
      }
      else {
        echo "0 results";
      }
      $conn->close();


?>
</body>

</html>