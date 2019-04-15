<?php
session_start();
$bookid=$_POST['bookid'];

$db=new mysqli('localhost','root','','DigitalLibrary');

if (!$db)
    die("Connection failed: " . mysqli_connect_error());
else{
$sql ="SELECT *FROM Books WHERE BookId='$bookid'";

$result=mysqli_query($db,$sql);
$id=mysqli_fetch_assoc($result);
    
if($id){
    $sqll ="DElETE FROM Books WHERE BookId='$bookid'";
    if(mysqli_query($db,$sqll))
     header('location: deletesuccess.html'); 
    else 
     echo "Error: " . $sql . "<br>" . mysqli_error($db); 
    }      
else
   header('location: bookerror1.html');
}      
mysqli_close($db);

?>
