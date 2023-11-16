<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';

if(isset($_POST['ok'])) 
{
	$Stud_ID =$_POST['Stud_No'];
	$sname = $_POST['name'];
	$fname = $_POST['fname'];
	$Lname = $_POST['Lname'];
	$db = $_POST['dob'];
	$gend = $_POST['gender'];
	
	if(is_uploaded_file($_FILES['img']['tmp_name']))
	{
		$source = $_FILES['img']['tmp_name'];
		$img_name = $Stud_ID.".jpg";
		$destination = "Student_Image/".$img_name;
		
		if(move_uploaded_file($source, $destination)) {
		}
	}
	$mb = $_POST['mob'];
	$class = $_POST['cls'];
	
	$sql = "INSERT INTO `student` (`Student_No`,`studentname`,`Middlename`,`LastName`,`dob`,`gender`,`mobile`,`image`,`class`) 
  VALUES('$Stud_ID','$sname','$fname','$Lname','$db','$gend','$mb','$img_name','$class')";
	$run = mysqli_query($con, $sql);
	
	$Studentnum = substr($Stud_ID,2) + 1;
	$query = "UPDATE `Settings` SET `Student_No`='$Studentnum'";
	$x = mysqli_query($con, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Library Management</title>
<link rel="stylesheet" href="CSS/form_page.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,800|Lato:300,400,700,400italic,900' rel='stylesheet' type='text/css'>
</head>

<body>
  <?php
    require 'Header.php';
  ?>
  
  <div class="main-form">
    <div class="head" style="background-color: brown;">
      <p class="head-para"><i class="fas fa-users"></i>&ensp;NEW STUDENT</p>
    </div>
    
    <hr class="h1" />
    
    <?php
	  $Stud_No="";
	  $sql1 = "SELECT * FROM `Settings`";
	  $run1 = mysqli_query($con, $sql1);
	  if($row1 = mysqli_fetch_assoc($run1))
	  {
		  $Stud_No=$row1['Student_No'];
	  }

$Stud_No = 'ST' . $Stud_No;

	?>
    
    <form action="#" method="post" enctype="multipart/form-data" onsubmit="message();">
      <div class="container-50">
        <div class="type1-1">
          <label for="Stud_No"><b>Student No :&ensp;</b></label>
          <input type="text" name="Stud_No" class="Stud_No" id = "Stud_No" value="<?php echo $Stud_No; ?>" required="required" readonly />
        </div>
      </div>
      
      <div class="container-100">
        <div class="type2">
          <label for="name"><b>Student Name :</b></label>
          <input type="text" name="name" class="name" id="name" required="required" />
        </div>
        
        <div class="type2">
          <label for="fname"><b>Middle Name :</b></label> 
          <input type="text" name="fname" class="fname" id="fname" required="required" />
        </div>
      
        <div class="type2">
          <label for="Lname"><b>Last Name :</b></label>
          <input type="text" name="Lname" class="Lname" id="Lname" required="required" />
        </div>
      </div>
        
      <div class="container-100">
        <div class="type2">
          <label for="dob"><b>Date of Birth :</b></label>
          <input type="date" name="dob" class="dob" id="dob" required="required" />
        </div>
      
        <div class="type2">
          <label for="gender"><b>Gender :</b></label>
          <div class="radio">
            <input type="radio" name="gender" class="gender" id="gender" value="male" /> Male&emsp;
            <input type="radio" name="gender" class="gender" id="gender" value="female" /> Female&emsp;
          </div>
        </div>
        
        <div class="type2">
          <label for="img"><b>Student's Photo :</b></label>
          <input type="file" name="img" class="img" id="img" required="required" />
        </div>
      </div>
      
      <div class="container">
        <div class="type2">
          <label for="Lname"><b>Mobile :</b></label>
          <input type="number" name="mob" class="mob" id="mob" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" required="required" />
        </div>
        
        <div class="type2">
          <label for="cls"><b>Major :</b></label>
          <select name="cls" class="cls" id="cls" required="required">
            <option value="" disabled selected hidden>Choose Class</option>
            <option>Information Technology [IT]</option>
            <option>Computer Science [CS]</option>
            <option>Information System [IS]</option>
            <option>Human Doctor</option>
            <option>Dentist</option>
            <option>Accountant</option>
            <option>Translation</option>
            <option>Musician</option>
            <option>Art & Painting</option>
            <option>Pharmacy</option>
            <option>Business Administration</option>
            <option>Mechanical Engineering</option>
            <option>Mechatronics</option>
            <option>Tools Care</option>
          </select>
        </div>
        
        <div class="type2"></div>
      </div>
      
      <div class="button-div">
          <input type="submit" name="ok" class="ok" id="ok" value="Submit" /> 
      </div>
    </form>
  </div>
</div>



<script type="text/javascript">
function message() {
	alert("Data Recorded");
}
</script>
</body>
</html>
