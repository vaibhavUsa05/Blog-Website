<?php
include "connDB.php";
session_start();

?>


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
    <?php
    if($_GET["id"] && $_GET["title"] ){
$cat_id =$_GET["id"];
$cat_title =$_GET["title"];

echo'<div class="card-Thread">
<div class="card-header">
'.$cat_title.'
</div>
<div class="card-body">
<h5>'.$cat_title.'</h5>
  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ducimus deserunt quisquam eligendi incidunt totam laboriosam dolores reiciendis nihil non praesentium modi, cum labore quo, maxime illo rerum? Eum fugiat maxime repellat deserunt a. Ea neque maiores ratione non minima ad deleniti cum, quibusdam doloribus tenetur iusto dignissimos enim reprehenderit pariatur eaque omnis rerum dolore eos.Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea neque maiores ratione non minima ad deleniti cum, quibusdam doloribus tenetur iusto dignissimos enim reprehenderit pariatur eaque omnis rerum dolore eos..</p>
  <p class="btn btn-primary">posted by : username</p>
</div> 
</div>';
    }

?>

  <form action="" method ="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1" style="padding-left :10rem;      font-size:37px;">post your question</label>
    <input type="text" class="form-control  w-90 p-3"  style="width:80vw; margin: auto;" name="query"  id="exampleFormControlInput1" placeholder="your query ">
  </div>

  <div class="form-group" >
    <label for="exampleFormControlTextarea1" style="padding-left :10rem;  margin-top:5vw;  font-size:37px;">query description</label>
    <textarea class="form-control w-90 p-3"  style="width:80vw;  margin: auto;" name ="querydesc" id="exampleFormControlTextarea1" rows="6" ></textarea>
  </div>
  <buttotarytn type="submit"  class="btn btn-success " style="padding:5vw 5 vw; margin-left:10rem ; margin-bottom: 5vw;" name="submit" >post now</button>
</form>


<?php

$cat_id=$_GET["id"];
$username=$_SESSION["username"];
if(isset($_POST["submit"])){
$query=$_POST["query"];
$querydesc=$_POST["querydesc"];
if(strlen($query)>0 && strlen($querydesc)){
$sql="INSERT INTO `thread`(`THREAD_ID`, `USERNAME`,`THREAD_DESC`, `THREAD_TITLE`, `CATEGORY_ID`,`THREAD_TIMESTAMP`) VALUES ('0','$username','$querydesc','$query','$cat_id',current_timestamp())";
$res=mysqli_query($conn,$sql);
if($res){
  echo'<div class="alert alert-success" role="alert">
  your query has been posted successfully.</div>';
 //echo"yes";
}
else{
echo"error in query";

}



}}


?>


<?php
$cat_id =$_GET["id"];
if(($_GET["username"])){
  $username=$_GET["username"];
$sql="SELECT * FROM `thread` WHERE `CATEGORY_ID`=$cat_id";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num){
  echo'<h3 style="padding-left:5rem;">Comments ...</h3>';
while($row=mysqli_fetch_assoc($res)){
   //echo $row["THREAD_ID"];
   //echo $row["THREAD_TITLE"];
   //echo $row["THREAD_DESC"];
echo '<div class="alert alert-success" role="alert">
Post :  <a href="comment.php?thread_id='.$row["THREAD_ID"].'&&thread_title='.$row["THREAD_TITLE"].'&&thread_desc='.$row["THREAD_DESC"].'&& username='.$username.'" class="alert-link">'.$row["THREAD_TITLE"].'</a>     '.$row["THREAD_TIMESTAMP"].'<br>'.substr($row["THREAD_DESC"],0,10).'......</div>';
}
}}
else{
  
  $sql="SELECT * FROM `thread` WHERE `CATEGORY_ID`=$cat_id";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num){
  echo'<h3 style="padding-left:5rem;">Comments ...</h3>';
while($row=mysqli_fetch_assoc($res)){
   //echo $row["THREAD_ID"];
   //echo $row["THREAD_TITLE"];
   //echo $row["THREAD_DESC"];
echo '<div class="alert alert-success" role="alert">
Post :  <a href="comment.php?thread_id='.$row["THREAD_ID"].'&&thread_title='.$row["THREAD_TITLE"].'&&thread_desc='.$row["THREAD_DESC"].'&& username='.$username.'" class="alert-link">'.$row["THREAD_TITLE"].'</a>     '.$row["THREAD_TIMESTAMP"].'<br>'.substr($row["THREAD_DESC"],0,10).'......</div>';
}
}
else{
  echo'
  <div class="jumbotron"  style="width:60vw; margin: auto; margin-bottom:5rem;">
  <h1 class="display-4">Oops!! NO Data to  display.</h1>
  <p class="lead">Be the first to ask a query.</p>
  <hr class="my-4">
  </p>
</div>';
}}
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
