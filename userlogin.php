<?php
$email=$_POST['email'];
$password=$_POST['pwd'];

$con=new mysqli('localhost','root','','DigitalLibrary');

if (!$con)
    die("Connection failed: " . mysqli_connect_error());
else
   $sql = "SELECT *FROM User WHERE Email='$email'";

$result=mysqli_query($con,$sql);
$user=mysqli_fetch_assoc($result);
if($user){
    if($user['Password']==$password)
       {
      echo "hello ....".$user['UserName']."welcomeee";
      echo "logged in successfully";
      header('location:search.html');
       }
    else{
      echo "wrong password";
       }
}
else 
    echo "No such User....";
 
mysqli_close($con);
?>
