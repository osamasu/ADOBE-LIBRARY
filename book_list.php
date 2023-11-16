<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';
?>

<!DOCTYPE html>
<html >
<head>
<title>Library Management</title>
<link rel="stylesheet" href="CSS/table_page.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,800|Lato:300,400,700,400italic,900' rel='stylesheet' type='text/css'>
</head>

<body>
  <?php
    require 'Header.php';
  ?>
  
  <div class="main-div">
    <div class="head">
      <p class="head-para"><i class="fas fa-book"></i>&ensp;BOOK LIST</p>
    </div>
    
    <hr class="h1" />
    
    
    <div class="div-content">
     
      <div class="div-content-right">
        <a href="new_book.php"><button class="button1">+ Add Book</button></a>
      </div>
      
    
    </div>
      
    <form action="#" method="post" enctype="multipart/form-data">
      <table class="my-table" id="my-table" border="0">
        <thead>
          <tr>
            <th style="width: 42px;">No.</th>
            <th>Book Name</th>
            <th>Book Code</th>
            <th>Author</th>
            <th>Publisher</th>
            <th style="width: 50px;">Stock</th>
          </tr>
        </thead>
        
        <tbody>
          <?php
            $sno=0;
		    $sql = "SELECT * FROM `book`";
		    $run = mysqli_query($con, $sql);
		    while($row = mysqli_fetch_assoc($run))
		    {
				$sno = $sno+1;
  	  		    echo '<tr>';
	  		      echo '<td>'.$sno.'</td>';
    		      echo '<td>'.$row['bookname'].'</td>';
				  echo '<td>'.$row['bookcode'].'</td>';
    		      echo '<td>'.$row['author'].'</td>';
				  echo '<td>'.$row['publisher'].'</td>';
				  echo '<td>'.$row['stock'].'</td>';
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
