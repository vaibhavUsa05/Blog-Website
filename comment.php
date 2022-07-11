<?php include 'connDB.php'?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./style.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php
$thread_id=$_GET["thread_id"];
$thread_title=$_GET["thread_title"];
$thread_desc=$_GET["thread_desc"];
$username=$_GET["username"];
$sql="SELECT * FROM `thread` WHERE `THREAD_ID`='$thread_id'";
echo'<div class="jumbotron">
<h1 class="display-2" style="top: 5px;font-style: italic;;font-weight: 980;position: absolute;text-align:center;font-size: 27px;">'.$thread_title.'</h1>
<h5>'.$thread_desc.' <br><br> <small>POSTED BY -'.$username.'</small></h5> 
</div>'

?>
  
<form action="" method="POST">
<div class="form-group">
    <label for="exampleFormControlTextarea1"> Post your solution to help the developers community</label>
    <textarea class="form-control"  name="comment_desc" id="exampleFormControlTextarea1" rows="6"></textarea>
  </div>
  <button style="position:relative; left:5vw;" name="submit"  class="btn btn-primary ">Submit</button>
</form>
<?php 
if(isset($_POST["submit"])){

  
    $thread_id=$_GET["thread_id"];
    //$thread_title=$_GET["thread_title"];
    //$thread_desc=$GET["thread_desc"];
$comment_desc=$_POST["comment_desc"];
if(strlen($comment_desc)>0){
$sql="INSERT INTO `comment` (`COMMENT_ID`, `COMMENT_DESC`, `THREAD_ID`, `COMMENT_TIMESTAMP`) VALUES ('0', '$comment_desc', '$thread_id', current_timestamp())";
$res=mysqli_query($conn,$sql);
if($res){
    echo"query resolved";
}
else{
    echo"error in resolving query";
}
}
else{
    echo'<script>alert("please give proper solution ")</script>';
}
}
?>

<?php
 $thread_id=$_GET["thread_id"];
$sql="SELECT * FROM `comment` WHERE `THREAD_ID`= $thread_id" ;
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num){
    while($row=mysqli_fetch_assoc($res)){
        echo'<div class="alert alert-primary" role="alert">'.$row["COMMENT_DESC"].'
        </div>';
     }
}

?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
<script src="index.js"></script>
</body>
</html>