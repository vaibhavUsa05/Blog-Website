<?php include "connDB.php" ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="signuppaige">
<h3>SIGNUP HERE</h3>
  <form action ="" method="POST">
  
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputUsername1"  placeholder="Enter username"  name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter email"  
    name="email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" name="submit" class="loginBlue btn btn-primary ">submit</button>
  <a href="./login.php">Already have an account?</a>
  </div>
</form>
<?php

if(isset($_POST["submit"])){
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$securedpassword=password_hash($password,PASSWORD_BCRYPT);
$sql="INSERT INTO `loginuser`(`USERNAME`,`EMAIL`,`PASSWORD`) VALUES ('$username','$email','$securedpassword')";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num>0){
  echo'<script>alert("account already exist")</script>';
   }
else{
    echo'<script>alert("account created successfully")</script>';
    header("location:./login.php");
}
}
?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>