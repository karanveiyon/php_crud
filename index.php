<?php
session_start();
include('connect.php');
if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $login_querry="SELECT * FROM admin WHERE email='$email' and password='$password'";
  $result = mysqli_query($db_connect,$login_querry);
/*   $id = mysqli_fetch_assoc($result); */
  if(mysqli_num_rows($result)>0)
  {
  while ($row=mysqli_fetch_assoc($result)) 
  {
      $_SESSION['id']=$row['id'];
			$_SESSION['login']=$row['uname'];
      $_SESSION["login_time_stamp"] = time(); 
			header('Location:./home.php');
  }
  }
  else
		{
			echo "<script>alert('Invalid Email or Password!');</script>";
		}
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
<link rel="stylesheet" href="./style/style.css">
</head>
<body>
<div class="container col-md-7">
<form action="index.php" method="post">
<div class="glass-card p-4">
  <h3>Sign In</h3>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">E-mail</span>
  <input type="email" name="email" class="form-control" placeholder="Enter your mail" aria-label="mail" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Password</span>
  <input type="password" name="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1">
</div>
<button type="submit" class="btn btn-success col-md-12" name="submit">Login</button>
</form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


