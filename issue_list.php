<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';
?>

<!DOCTYPE html >
<html>
<head>
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
    <div class="head" >
      <p class="head-para"><i class="fas fa-book"></i>&ensp;ISSUE LIST</p>
    </div>
    
    <hr class="h1" />
  
    <form action="#" method="post" enctype="multipart/form-data">
      <table class="my-table" id="my-table" border="0">
        <thead>
          <tr>
            <th style="width: 42px;">No.</th>
            <th>Student No.</th>
            <th>Student Name</th>
            <th>Book Name</th>
            <th>Book Code</th>
            <th style="width: 85px;">Issue Date</th>
          </tr>
        </thead>
        
        <tbody>
          <?php
            $sno=0;
		    $sql = "SELECT student.studentname,book.bookname,issue.Student_No,issue.bookcode,issue.doc FROM `student`,`book`,`issue` WHERE issue.Student_No=student.Student_No AND issue.bookcode=book.bookcode AND status = 1";
		    $run = mysqli_query($con, $sql);
		    while($row = mysqli_fetch_assoc($run))
		    {
				$sno = $sno+1;
				$datestore = $row['doc'];
    			$newvar = new DateTime($datestore);
	    		$ndate = $newvar->format('d-m-Y');
  	  		    echo '<tr>';
	  		      echo '<td>'.$sno.'</td>';
				  echo '<td>'.$row['Student_No'].'</td>';
    		      echo '<td>'.$row['studentname'].'</td>';
    		      echo '<td>'.$row['bookname'].'</td>';
				  echo '<td>'.$row['bookcode'].'</td>';
				  echo '<td>'.$ndate.'</td>';
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
