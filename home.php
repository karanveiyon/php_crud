<?php
session_start();
include('session.php');
include('connect.php');

if(isset($_POST['submit']))
{
  $name =$_POST['name'];
  $mail =$_POST['email'];
  $dob =$_POST['date'];
  $address =$_POST['address'];
  $insertquerry = "INSERT INTO `contact`(`id`,`name`,`email`,`dob`,`address`) VALUES (null,'$name','$mail', '$dob','$address')";
  $result = mysqli_query($db_connect, $insertquerry);
  if($result === TRUE)
  {
    echo "<script>alert('Contact Added')</script>";
  }
  else
  {
    echo "<script>alert('Process Failed')</script>";
  }
}
if(isset($_POST['view']))
{
  $select_querry = "SELECT * FROM `contact`";
  $fetch_result = mysqli_query($db_connect,$select_querry);
  $fetch_array = mysqli_fetch_all($fetch_result);
 
;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="./style/home.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
<nav class="me-5 mt-3" style="float:right"><a class="logout" href="logout.php"><button class="btn btn-danger" name="logout">Logout</button></a></nav>
<br>  
<div class="container form col-md-6 pt-5 mt-5">
<h3 class="heading pb-3">Contact Form</h3>
<form method="post" action="home.php">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Name</span>
  <input type="text" name="name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">E-mail</span>
  <input type="email" name="email" class="form-control" placeholder="enter your E-mail" aria-label="" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">D.O.B</span>
  <input type="date" name="date" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>
<div class="input-group">
  <span class="input-group-text">Address</span>
  <textarea name="address" class="form-control" aria-label="With textarea"></textarea>
</div>
<br>
<button type="submit" value="submt" name="submit" class="btn btn-success col-md-5"> Submit </button>
<button type="reset" class="btn btn-danger col-md-5"> Reset </button>
</form>
</div>
<br>
<form action="" method="post">
<div class="container col-md-8">
<button class="btn btn-primary" value="view" name="view">View Contact Forms</button>

</form>
<table class="table">
  <thead>
   <tr>
    <th scope="col">Id</th>
    <th scope="col">Name</th>
    <th scope="col">E-mail</th>
    <th scope="col">D.O.B</th>
    <th scope="col">Address</th>
   </tr>
  </thead>
  <tbody>
  <tr>
    <?php
    if(  $fetch_array>0)
    {
    foreach($fetch_array  as  $element)
    {
      echo "<tr><td scope='col'>".$element[0]."</td><td scope='col'>".$element[1]."</td><td scope='col'>".$element[2]."</td>
            <td scope='col'>".$element[3]."</td><td scope='col'>".$element[4]."</td><td scope='col'>".$element[5]."</td>   </tr>";
    }
  }?>
    </tr>
  </tbody>
</table>
  </div>
<svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,32L34.3,53.3C68.6,75,137,117,206,138.7C274.3,160,343,160,411,144C480,128,549,96,617,117.3C685.7,139,754,213,823,213.3C891.4,213,960,139,1029,96C1097.1,53,1166,43,1234,53.3C1302.9,64,1371,96,1406,112L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
