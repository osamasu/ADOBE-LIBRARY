<?php
session_start();
require '../connect.php';

$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST") {
	
	$id = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE `UserID`='$id' AND `Password`='$pass'";
    $run = mysqli_query($con, $sql) ;
    $rows = mysqli_num_rows($run);
    
	if($rows>0) {
		$_SESSION['userid'] = $id;
		$_SESSION['Status'] = "Active";
		header("Location: ../index.php");
	}
	else {
		$msg = "* Invalid Username or Password";
	}
}
?>

<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="CSS/login_page.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,800|Lato:300,400,700,400italic,900' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="main-div">
  <div class="content-div">
    <div class="content-div2">
    <div class="square" style="--i:0;"></div>
		<div class="square" style="--i:1;"></div>
		<div class="square" style="--i:2;"></div>
		<div class="square" style="--i:3;"></div>
		<div class="square" style="--i:4;"></div>
    <center><img src="Image/login-.gif" class="user-img" id="user-img" /></center>
      <!--<p class="heading">LOGIN</p>-->
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="container-username">
          <input type="text" name="username" class="username" id="username" placeholder="Username" required />
        </div>
       
        <div class="container-password">
          <input type="password" name="password" class="password" id="password" placeholder="Password"  required />
          <img src="..\Login\Image\hide.png" id="eye_icon" class="eye_icon"></img>
        </div>
      
        <span class="invalid" id="invalid"><?php echo $msg; ?></span>
      
        <div class="button-container">
          <input type="submit" name="ok" class="ok" id="ok" value="Login" />
        </div>
      </form>
    </div>
  </div>
</div>

<script language="javascript" type="text/javascript">

  let eye_icon=document.getElementById("eye_icon");
  let password=document.getElementById("password");
  
  eye_icon.onclick =function()
  {
    if(password.type=="password")
    {
      password.type="text";
      eye_icon.src="../Login/Image/eye_open.png";
    }
    else
    {
      password.type="password";
      eye_icon.src="../Login/Image/hide.png";
    }
  }

</script>

</body>
</html>