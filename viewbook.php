<html>
<head><title>ViewBook</title>
<style>
body{
background-color:#05BAF2;
}
h1{
font-size:40px;
color:black;
}
table,th{
border: 2px solid black;
color:black;
font-size:40px;
border-collapse: collapse;
}
td{
border: 2px solid black;
color:black;
font-size:30px;
border-collapse: collapse;
}
</style>
</head>
<body>
<table width="100%">
<h1><center>Available Books</h1>
<?php
session_start();
$db=new mysqli('localhost','root','','DigitalLibrary');
if (!$db)
    die("Connection failed: " . mysqli_connect_error());
else
    $sql ="SELECT *FROM Books order by BookId";

$result=mysqli_query($db,$sql);

if (mysqli_num_rows($result) > 0)
{
echo "<tr><th><center>BookID</th><th><center>BookName</th><th><center>Author</th><th><center>Subject</th><th><center>Preview</th></tr>"."<br>";
    while($row = mysqli_fetch_assoc($result))
     {   
echo "<tr><td><center>".$row["BookId"]."</td><td><center>".$row["BookName"]."</td><td><center>".$row["Author"]."</td><td><center>".$row["Subject"]."</td>";
   if($row["BookId"]==1)
       echo"<td><center><a href='ooad_tutorial.pdf'>preview</a></td></tr><br>";
   if($row["BookId"]==2)
       echo"<td><center><a href='mc_tutorial.pdf'>preview</a></td></tr><br>";
   if($row["BookId"]==3)
       echo"<td><center><a href='da_tutorial.pdf'>preview</a></td></tr><br>";
   if($row["BookId"]==4)
       echo"<td><center><a href='cd_tutorial.pdf'>preview</a></td></tr><br>";
   if($row["BookId"]==5)
       echo"<td><center><a href='sta_tutorial.pdf'>preview</a></td></tr><br>";
      }
}
else
{
    echo "<h2>0 results</h2>";
}

mysqli_close($db);
?>
</table>
</body>
</html>
