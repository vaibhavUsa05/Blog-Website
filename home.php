<?php
SESSION_start();
if(isset($_SESSION['username'])){
echo'<script>alert(Welcome '.$_SESSION["username"].')</script>';
}
else{
  header('location:./login.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Website Forum</title>
  </head>
  <body>
  <div class="bd-example">                         
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
   
    <ol class="carousel-indicators">
      <div class="blue">
    <button type="submit" name="submit" style="position: absolute; top :-25vw; right:5rem;"><a href="./login.php">Login</a></button> 
    <button type="submit" name="submit" style="position: absolute; top :-25vw; right:0.5rem;"><a href="./signup.php">SIGNUP</a></button> 
    </div>
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./img/img2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/img.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/img2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    <?php include 'connDB.php'?>
    <?php



  $sql="SELECT * FROM category ";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($res)){
    $cat_id=$row["CATEGORY_ID"];
    $cat_title=$row["CATEGORY_TITLE"];
    $cat_desc=$row["CATEGORY_DESC"];
    $cat_timestamp=$row["CATEGORY"];
   $username=$_SESSION["username"];
  echo'<div class="cardComponent">
  <div class="card" style="width: 18rem;height:18rem; ">
    <img src="./img/img.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">'.$cat_title.'</h5>
      <p class="card-text">'.$cat_desc.'</p>
  <form action="" method="POST">
  <button type="submit" name="submit"><a href="thread.php?id='.$cat_id.'&& title='.$cat_title.'&& desc='.$cat_desc.'&& username='.$username.'">view thread</a></button>                            
  </form>
    </div>
  </div>';
     }
?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>