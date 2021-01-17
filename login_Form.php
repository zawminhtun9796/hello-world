
<!DOCTYPE html>

<html>

<head>
  <title>www.users.com</title>


  <style>

  body{

  background-color:rgb(59,59,105);
    }

img { width:200px; height:190px;


    }
    table{

        margin-top:50px;
        width:30%;


    }
    table,td{
        text-align: center;
    }



  h1{


   color:#3AB2C9;
  }
  b{
      font-family: "Times New Roman", Times, serif;
      font-size:large;
      color:#3AB2C9;
  }



   .btnsubmit{
      font-family: "Times New Roman", Times, serif:bold;
      font-size:large;
      color:#3AB2C9;

  }
  input[type='submit']:hover {background-color: #024978;}
  input[type='text'], input[type='email'], input[type='password'] {width: 200px; border-radius: 2px;border: 1px solid #CCC; padding: 10px; color: #333; font-size: 14px; margin-top: 10px;}
  input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #0067ab; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 2px; margin-top: 10px; cursor:pointer;}




  p{
      font-size: medium;color:yellow;text-align: center;
  }

</style>



</head>
<body>


<?php



        if (isset($_POST['btnLogin']))
        {

        $name=$pass=$err="";

        $name =$_POST["name"];
        $pass=$_POST["password"];

          if((!empty($name) && !empty($pass)) && ($name!="" && $pass!=""))
           {





$servername = "localhost";
$username = "zawminhtun";
$password = "P@ssc0dekozaw$";
$dbname = "internshipdatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
  die("Connection failed: " . $conn->connect_error);
  }
    else
    {
$sql = "SELECT user_name,password FROM myUser WHERE user_name='$name' AND password='$pass'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){


       header("location:userList.php");


    }
    else echo "<script>alert('Invalid User_name Or Password!');</script>";
   }
mysqli_close($conn);
   }
}
else  echo"<script>alert('Type valid user_name and password!');</script>";

}


?>






 <form method="post" action="">
 <table align="center">
     <tr><td></td><td>  <h1><img src="img/login.jpg" alt="main photo"/></h1>
      <h1>User Login</h1></td>
          </tr>
   <tr><td><b>User name:<b></td>
       <td><input type="text" name="name" placeholder="Enter user name"></td>
	</tr>
	<tr>
        <td><b>Password:<b></td>
		<td><input type="password" name="password" placeholder="Password"></td>
	</tr>
	<tr><td></td>

	    <td><input type="submit" name="btnLogin" value="Login" class="btnsubmit"></td>

	</tr>
</table>

 </form>




</body>
</html>

