<?php
session_start();
$bookid=$_POST['bookid'];
$bookname=$_POST['bookname'];
$author=$_POST['author'];
$subject=$_POST['subject'];

$db=new mysqli('localhost','root','','DigitalLibrary');

if (!$db)
    die("Connection failed: " . mysqli_connect_error());
else
    $sql ="SELECT *FROM Books WHERE BookId='$bookid'";

$result=mysqli_query($db,$sql);
$id=mysqli_fetch_assoc($result);

if($id)
    header('location: bookerror.html');
else{
       $sqll = "INSERT INTO Books (BookId, BookName, Author , Subject) VALUES('$bookid','$bookname','$author','$subject')";
          if (mysqli_query($db, $sqll))
          {
            header('location: addsuccess.html');
          }
         else 
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
           }       
mysqli_close($db);

?>
