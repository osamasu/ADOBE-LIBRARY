<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';
$Stud_Num=$_GET['var'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management</title>
<link rel="stylesheet" href="CSS/form_page.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,800|Lato:300,400,700,400italic,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>



</head>

<body>
  <?php
    require 'Header.php';
  ?>
  
  <div class="main-form">
    <div class="head" style="background-color: red;">
      <p class="head-para"><i class="fas fa-user"></i>&ensp;STUDENT DETAILS</p>
    </div>
    
    <hr class="h1" />
      
    <?php
	  $stname="";
	  $gender="";
	  $mob="";
	  $fname="";
	  $Lname="";
	  $dob="";
	  $img="";
	  $class="";
	  $sql = "SELECT * FROM `student` WHERE Student_No = '$Stud_Num'";
	  $run = mysqli_query($con, $sql);
	  if($row = mysqli_fetch_assoc($run))
	  {
      $Stud_Num = $row['Student_No'];
		  $stname=$row['studentname'];
		  $fname=$row['Middlename'];
	      $Lname=$row['LastName'];
		  $dob=$row['dob'];
		  $gender=$row['gender'];
		  $mob=$row['mobile'];
		  $img=$row['image'];
	      $class=$row['class'];
	  }
	  $dt=new DateTime($dob);
	  $newdt=date_format($dt,'d-m-Y');
    ?>
    
    <div class="img-container">
      <img src="<?php echo "Student_Image/".$img; ?>" class="st-image" />
    </div>
			 
	<div class="container-100">
      <div class="type2">
        <label for="name"><b>Student Name :</b></label>
        <input type="text" name="name" class="name" id="name" value="<?php echo $stname; ?>" readonly />
      </div>
       
      <div class="type2">
      <label for="admnum"><b>Student No. :</b></label>
        <input type="text" name="admnum" class="admnum" id="admnum" style="width:50%;" value="<?php echo $Stud_Num; ?>" readonly />
      </div>
        
      <div class="type2">
        <label for="class"><b>Major :</b></label>
        <input type="text" name="class" class="class" id="class" value="<?php echo $class; ?>" readonly />
      </div>
    </div>
      
    <div class="container-100">
      <div class="type2">
        <label for="mob"><b>Mobile :</b></label>
        <input type="text" name="mob" class="mob" id="mob" value="<?php echo $mob; ?>" readonly />
      </div>
        
      <div class="type2">
        <label for="fname"><b>Middle Name :</b></label>
        <input type="text" name="fname" class="fname" id="fname" value="<?php echo $fname; ?>" readonly />
      </div>
      
      <div class="type2">
        <label for="Lname"><b>Last Name :</b></label>
        <input type="text" name="Lname" class="Lname" id="Lname" value="<?php echo $Lname; ?>" readonly />
      </div>
    </div>
      
    <div class="container-100">
      <div class="type2">
        <label for="dob"><b>Date of Birth :</b></label>
        <input type="text" name="dob" class="dob" id="dob" value="<?php echo $newdt; ?>" readonly />
      </div>
        
       <div class="type2">
        <label for="gender"><b>Gender :</b></label>
        <input type="text" name="gender" class="gender" id="gender" value="<?php echo $gender; ?>" readonly />
      </div>
      
      <div class="type2"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
var dropimg = document.getElementsByClassName("user-img");
var modal = document.getElementById("user-detailsid");
var i;

for (i = 0; i < dropimg.length; i++) {
  dropimg[i].addEventListener("click", function() {
  this.classList.toggle("drop");
  var Header = this.nextElementSibling;
  if (Header.style.display === "block") {
  Header.style.display = "none";
  } else {
  Header.style.display = "block";
  }
  });
}

window.onclick = function(event) {
	if(event.target == modal) {
		modal.style.display = "none";
	}
}
</script>
</body>
</html>
