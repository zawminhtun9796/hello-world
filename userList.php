<!DOCTYPE html>

<html>

<head>
  <title>www.users.com</title>

   <style>

   input{
          font-size: 15px;
       color:rgb(100,700,50);
       font:bold;
       background-color:rgb(50,50,50);

   }
   input:hover{

   color: red;
   }

   a{
       font-size: 15px;
       color:rgb(100,700,50);
       font:bold;

   }

   a:hover {

  color: red;
      }
      a.menu{
      font-size:20px;
      }

  body{

 background-color:rgb(59,59,105);
    }


    h1{

  text-align: center;
   color:rgb(33,223,33);
  }




   table,th,td{
       border:1px solid black;
       text-align:center;


   }

   table{
       width:50%;
       background-color:rgb(50,50,50);
   }
   th{ font:bold;
       font-size:20px;
       color: yellow;

       height:30px;
   }
   td{
       font-size: 15px;
       color:white;
       height:25px;
   }

   b{


       font-size: 20px;
       color:rgb(100,700,50);
       font:bold;
   }

    </style>

</head>

<body>
    <h1>User List Form</h1>



<?php

$servername = "localhost";
$username = "zawminhtun";
$password = "P@ssc0dekozaw$";
$dbname = "internshipDatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
            }
else {

$sql = "SELECT id,user_name,password FROM myUser";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
 {
  // output data of each row
  echo "<table align='center'><tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Password</th>
                                <th>Action</th>
                              </tr>";
  while($row = mysqli_fetch_assoc($result))
       {
      echo "<tr><td>".$row["id"]."</td><td>".$row["user_name"]."</td><td>".$row["password"]."</td>" ;
      ?>
      <td><a href="delete-process.php?userid=<?php echo $row["id"]; ?>">Delete</a></td>
      <?php


        }
        echo "</table>";
  }

  mysqli_close($conn);

 }


?>
<br><br>
<table align="center">
      <tr>
          <td><a href="insertToUser.php" class="menu">New User & Edit User</a></td>
          <td><a href="login_Form.php" class="menu">Logout</a></td>
      </tr>
</table>



</body>
</html>