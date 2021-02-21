<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Basic Crude Operation in PHP</title>
    <style>
    .mark{
        font-weight: bold;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="print.css" media="print" >
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="font-weight: bold;font-style: italic;font-size: x-large;">ONILNE COURSES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="#">About us</a>
        <a class="nav-link" href="#">Contact us</a>
      </div>
    </div>
  </div>
</nav>
<!-- Button trigger modal -->
<div class="text-center mt-3">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userinput">
  Add New Coures
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="userinput" tabindex="-1" aria-labelledby="userinputLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userinputLabel">Add New Coures</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action='index.php' method='POST' >
  <div class="container " style="margin-top: 5%;" >
  <div class="card" style="width: 21rem;">
  <div class="card-body">
  <form action="user.php" method="POST">
  <div class="mb-3">
    <label class="form-label">USERNAME</label>
    <input type="text" name="username" class="form-control" >
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputSECTION1">SECTION</label>
    <select class="form-control" name="section" id="exampleInputSECTION1">
    <?php 
    include('db/connect.php');
                $sql="SELECT * FROM section ";
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
    <option><?php echo  $row["id"]." ".$row["main_course"];?></option>
    <?php  }
    }?>
    </select>
    
  </div>
  <div class="mb-3">
    <label  class="form-label">COURSE ID</label>
    <input type="number" name="course_id" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Youtube Url</label>
    <input type="text" name="url" class="form-control" >
  </div>
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
</form> 
      </div>
     
    </div>
  </div>
</div>
  
  </div>
</div>
</div>
<div class=row>
<div class='col-sm-4'>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Filter Section
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php 
    include('db/connect.php');
                $sql="SELECT * FROM section ";
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
    <a class="dropdown-item" href="filter.php?get_section=<?php echo  $row["id"];?>"><?php echo $row["main_course"];?></a>
    <?php  }
    }?>
  </div>
</div>
</div>
<div class='col-sm-4'>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Filter by Course ID
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php 
    include('db/connect.php');
                $sql="SELECT * FROM sub_course ";
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
    <a class="dropdown-item" href="filter.php?get_course_id=<?php echo  $row["course_id"];?>"><?php echo $row["course_id"]; ?></a>
    <?php  }
    }?>
  </div>
</div>
</div>
</div>
<hr>
<?php
include('db/connect.php');
$sql="SELECT * FROM sub_course ";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $youtube_url= $row["url"];
      $video_id=preg_replace("#.*youtube\.com/watch\?v=#","",$youtube_url);
      ?>
      <iframe width="640" height="360" src="https://www.youtube.com/embed/<?php echo $video_id ?>" frameborder="0" allowfullscreen></iframe>
    <?php
    }
  }
?>

  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
<!--     
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>

<?php

include('db/connect.php');
if(isset($_POST['submit'])){
 $username=$_POST['username'];
 $section=$_POST['section'];
 $x=explode(" ",$section);
  $section=$x[0];
 $course_id=$_POST['course_id'];
 $url=$_POST['url'];
 $query=mysqli_query($conn,"INSERT INTO sub_course SET username='$username',section_id='$section',course_id='$course_id',url='$url'  ");
 echo "<script>window.location.href='index.php' ;</script>";
}

?>


