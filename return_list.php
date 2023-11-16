<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';
?>

<!DOCTYPE HTML>
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
    <div class="head">
      <p class="head-para"><i class="fas fa-book"></i>&ensp;RETURN LIST</p>
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
            <th style="width: 100px;">Issue Date</th>
            <th style="width: 100px;">Return Date</th>
            <th>Fine</th>
          </tr>
        </thead>
        
        <tbody>
          <?php
            $sno=0;
            
		    $sql = "SELECT student.studentname,STUDENT.Middlename,book.bookname,return.Student_No,return.bookcode,return.issue_date,return.fine,return.doc
         FROM `student`,`book`,`return` 
         WHERE return.Student_No=student.Student_No AND return.bookcode=book.bookcode";

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
    		      echo '<td>'.$row['studentname'].'  '.$row['Middlename'].'</td>';
    		      echo '<td>'.$row['bookname'].'</td>';
				  echo '<td>'.$row['bookcode'].'</td>';
				  echo '<td>'.$row['issue_date'].'</td>';
				  echo '<td>'.$ndate.'</td>';
				  echo '<td>'.$row['fine'].'</td>';
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
