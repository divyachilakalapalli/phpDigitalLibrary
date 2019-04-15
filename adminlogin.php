<?php
session_start();
$username=$_POST['username'];
$password=$_POST['pwd'];

$db=new mysqli('localhost','root','','DigitalLibrary');

if (!$db)
    die("Connection failed: " . mysqli_connect_error());
else
    $sql ="SELECT *FROM Admin WHERE UserName='$username'";

$result=mysqli_query($db,$sql);
$user=mysqli_fetch_assoc($result);

if($user){
    if($user['Password']==$password)
       {
      header('location: aalogin.html');
       }
    else{
        header('location: adminerror.html');
      echo "wrong password";
       }
}
else 
    header('location: adminerror1.html');
mysqli_close($db);

?>
