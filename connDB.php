<?php
$servername="localhost";
$password="";
$username="root";
$database="web builder forum";
$conn=mysqli_connect($servername,$username,$password,$database);
if($conn){
// echo"connection success";
}
else{
echo"connection unsuccess";
}

   



?>