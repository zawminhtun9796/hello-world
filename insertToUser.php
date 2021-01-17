<!DOCTYPE html>

<html>

<head>
  <title>www.users.com</title>

  <style>



  body{

  background-color:rgb(59,59,105);
      }



  div{
          margin-left: 2%;
          margin-top:2%;
      }


  img { width:120px; height:110px;


    }

  table{
        width:32%;

       }
 .tb2{

    width:45%;
    border:0px;
    }

 .tb3{

    border:0px;
    width:50%;

    }
 .form3
    {
        width:60px;
        margin-left: 52%;
        margin-top:10%;
    }

  td
    {
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
      font-size:small;
      color:#3AB2C9;
      width:40%;

             }

input[type='submit']:hover {background-color: #024978;}
input[type='text'], input[type='password'] {width: 200px; border-radius: 2px;border: 1px solid #CCC; padding: 10px; color: #333; font-size: 14px; margin-top: 10px;}
input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #0067ab; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 2px; margin-top: 10px; cursor:pointer;}

 input{
          width:75%;
           }


  p
   {
      font-size: medium;color:yellow;text-align: center;
   }


  a{
       font-size: 20px;
       color:rgb(100,700,50);
       font:bold;
    }

  a:hover
   {

  color: red;
  }


</style>

</head>

<body>
     <div>
      <a href="userList.php">Go User List</a> &nbsp; <a href="login_Form.php">Log Out</a>
     </div>

<form method="post" >
 <table align="left">
     <tr>
         <td></td>
         <td><h1>Add New User</h1></td>
     </tr>
     <tr>
         <td><b>User name:<b></td>
         <td><input type="text" name="name" placeholder="Enter user name"></td>

   	 </tr>
	 <tr>
        <td><b>Password:<b></td>
		<td><input type="text" name="password" placeholder="Password"></td>
     </tr>
     <tr>
         <td></td>
         <td><input type="submit" name="btn_save" value="Save" class="btnsubmit"></td>
     </tr>
</table>
 </form>



 <form method="post" >
 <table align="center" class="tb2">
     <tr>
         <td></td>
         <td><h1>Edit User Info</h1></td>
     </tr>
     <tr>
         <td><b>Search By Name:</b></td>
         <td><input type="text" name="search_name" placeholder="Enter user name" value=""/></td>
         <td><input type="submit" name="btn_search" value="Search"></td>
     </tr>
 </table>
 </form>





 <?php
         //Insert new user MySQL database;
$name=$pass=$check_exist_user=$error="";



if (isset($_POST['btn_save']))
{


    //echo "what";
    $name   = $_POST['name'];
    $pass  = $_POST['password'];

    if((!empty($name) && !empty($pass)) && ($name!="" && $pass!=""))
    {

    if(call()==true)
      {
    echo"<script>alert('This user is already exist!');</script>";
      }
    else
      {

$dbhost = 'localhost';
$dbuser = 'zawminhtun';
$dbpass = 'P@ssc0dekozaw$';
$db = 'internshipdatabase';


// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{


$sql = "INSERT INTO myUser (user_name, password)
VALUES ('$name','$pass')";

if ($conn->query($sql) === TRUE)
 {
    echo "<script>alert('Successful Saved!.......1 user id added.');</script>";


  }
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
          }

$conn->close();

 } //connection

  }

  }
  //empty text box;
else echo"<script>alert('Failed! Fill the box correctly');</script>";



}   //btn check

//insert process;



function call()  //check input user is already have?
{
      $name   = $_POST['name'];

$servername = "localhost";
$username = "zawminhtun";
$password = "P@ssc0dekozaw$";
$dbname = "internshipdatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else
    {
$sql = "SELECT id FROM myUser WHERE user_name='$name'";
if($result = mysqli_query($conn, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {


       return true;


    }
    else return false;
   }
mysqli_close($conn);
   }




}



?>



<?php
     // Update the user info
if (isset($_POST['btn_update']))
{




 $up_name=$up_pass=$id="";

     $up_name=$_POST["update_name"];
     $up_pass=$_POST["update_pass"];
     $id=$_POST["userid"];


     if((!empty($up_name) && $up_name!="") && (!empty($up_pass) && $up_pass!=""))
     {

$servername = "localhost";
$username = "zawminhtun";
$password = "P@ssc0dekozaw$";
$dbname = "internshipdatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else
    {
$sql = "UPDATE myUser SET user_name='$up_name',password='$up_pass' WHERE id='$id'";
if($result = mysqli_query($conn, $sql))
{
    echo "<script>alert('Successful Updated!');</script>";
    }

    else echo "<script>alert('Failed! Please try again....');</script>";
   }
mysqli_close($conn);
   }





     else echo "<script>alert('Check your data');</script>";
}

 //for updating....
?>





<?php

       // for searching .....to update....


if (isset($_POST['btn_search']))
{      $id=$search_name=$search_pass="";


  $search_name   = $_POST['search_name'];
            if(!empty($search_name) && $search_name!="")
            {

    //echo "what";




$dbhost = 'localhost';
$dbuser = 'zawminhtun';
$dbpass = 'P@ssc0dekozaw$';
$db = 'internshipdatabase';


// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
            }
else {

$sql = "SELECT id,user_name,password FROM myUser WHERE user_name='$search_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
 {
  // output data of each ro
    while($row = mysqli_fetch_assoc($result))
       {     ?>
       <form action="" method="post" class="form3">
            <table class="tb3">
                <tr><td></td><td><p>*****Searching Results*****</p><font color="violet">You can change your name and password as you like....</font></td></tr>
                <tr><td><b>Id</b></td><td><input type="text" readonly="readonly" name="userid" value="<?php echo $row["id"];?>" /></td></tr>

                <tr><td><b>Name</b></td><td><input type="text" name="update_name" value="<?php echo $row["user_name"];?>" /></td></tr>
                <tr><td><b>Password</b></td><td><input type="text" name="update_pass" value="<?php echo $row["password"];?>" /></td></tr>
                <tr><td></td><td><input type="submit" name="btn_update" value="Update" /></td></tr>
            </table>
        </form>

        <?php
       }
  }
  else
   {
    echo "<script>window.alert('No Found data!');</script>";
      }

$conn->close();

   } //connection

        }else   echo "<script>window.alert('Check your input data!');</script>";

}   //btn check
?>

</body>
</html>

