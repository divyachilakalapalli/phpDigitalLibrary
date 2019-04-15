<?php
session_start();
$username=$_POST['username'];
$phno=$_POST['phno'];
$email=$_POST['email'];
$password=$_POST['pwd'];
$cpassword=$_POST['cpwd'];
$gender=$_POST['gender'];

$db=new mysqli('localhost','root','','DigitalLibrary');

if (!$db)
    die("Connection failed: " . mysqli_connect_error());
else
    $sql ="SELECT *FROM User WHERE Email='$email'";

$result=mysqli_query($db,$sql);
$user=mysqli_fetch_assoc($result);

if($user)
    header('location: registererror1.html');
else{
   if($password==$cpassword)
      {
       $sqll = "INSERT INTO User (UserName, PhoneNumber, Email , Password ,Gender) VALUES ('$username','$phno','$email','$password','$gender')";
       if (mysqli_query($db, $sqll))
            {
            echo "New record created successfully";
            header('location: reglogin.html');
            }
       else 
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
      }
   else
       header('location: registererror.html');
    }
       
mysqli_close($db);

?>
