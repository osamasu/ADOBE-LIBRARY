<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management</title>
<link rel="stylesheet" href="CSS/table_page.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,800|Lato:300,400,700,400italic,900' rel='stylesheet' type='text/css'>
</head>

<body>
  <?php
    require 'Header.php';
  ?>
  
  <div class="main-div">
    <div class="head">
      <p class="head-para"><i class="fas fa-users"></i>&ensp;STUDENT LIST</p>
    </div>
    
    <hr class="h1" />
    
    
    <div class="div-content">
    
      <div class="div-content-right">
        <a href="new_student.php"><button class="button1">+ Add Student</button></a>
      </div>
      
    
    </div>
      
    <form action="#" method="post" enctype="multipart/form-data">
      <table class="my-table" id="my-table" border="0">
        <thead>
          <tr>
            <th style="width: 42px;">No.</th>
            <th style="width: 60px;">Image</th>
            <th>Student Name</th>
            <th>Student No.</th>
            <th>Major</th>
            <th>Mobile</th>
            <th style="width: 20px;"">Action</th>
          </tr>
        </thead>
        
        <tbody>
          <?php
            $sno=0;
		    $sql = "SELECT Student_No,studentname,image,class,mobile FROM `student`";
		    $run = mysqli_query($con, $sql);
		    while($row = mysqli_fetch_assoc($run))
		    {
				$sno = $sno+1;
			    $imgst="Student_Image/".$row['image'];

  	  		    echo '<tr>';
	  		      echo '<td>'.$sno.'</td>';
     		      echo '<td><img src='.$imgst.' class="image" id="image" /></td>';
    		      echo '<td>'.$row['studentname'].'</td>';
				  echo '<td>'.$row['Student_No'].'</td>';
    		      echo '<td>'.$row['class'].'</td>';
				  echo '<td>'.$row['mobile'].'</td>';
				  echo '<td><a href="student_details.php?var='.$row['Student_No'].' "><img class="img-details" src="Image/contact-book.png"></img></a></td>';
		   	  echo '</tr>'; 
		    }
		  ?>
        </tbody>
      </table>
    </form>
  </div>
</div>


</body>
</html>
