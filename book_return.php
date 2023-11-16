<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';
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
    <div class="head" style="background-color: #FF6F00;">
      <p class="head-para"><i class="fas fa-book-reader"></i>&ensp;RETURN BOOK</p>
    </div>
    
    <hr class="h1" />
    
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="container-50">
        <div class="type1-2">
          <label for="Stud_no"><b>Student No. :&ensp; ST</b></label>
          <input type="number" name="Stud_no" class="Stud_no" id="Stud_no" />&emsp;
          <input type="submit" name="search" class="search" id="search" value="Search" />
        </div>
      </div>
    </form>
    
  <?php
    if(isset($_POST['search'])) 
	{
		$Stud_no= "ST" . $_POST['Stud_no'];
		$stname="";
		$clss="";
		$mob="";
		$fname="";
		$Lname="";
		$sql = "SELECT * FROM `student` WHERE Student_No = '$Stud_no'";
		$run = mysqli_query($con, $sql);

    if(mysqli_num_rows($run) == 0){
      return ;
    }

		if($row = mysqli_fetch_assoc($run))
	    {
			$stname=$row['studentname'];
			$clss=$row['class'];
		    $mob=$row['mobile'];
		    $fname=$row['Middlename'];
		    $Lname=$row['LastName'];
		}
  ?>
      
      <p class="para">Student Details</p>
      
      <div class="container-100">
        <div class="type2">
          <label for="name"><b>Student Name :</b></label>
          <input type="text" name="name" class="name" id="name" value="<?php echo $stname; ?>" readonly />
        </div>
       
        <div class="type2">
          <label for="admnum"><b>Student No. :</b></label>
          <input type="text" name="admnum" class="admnum" id="admnum" style="width:50%;" value="<?php echo $Stud_no; ?>" readonly />
        </div>
        
        <div class="type2">
          <label for="class"><b>Class :</b></label>
          <input type="text" name="class" class="class" id="class" value="<?php echo $clss; ?>" readonly />
        </div>
      </div>
      
      <div class="container-100">
        <div class="type2">
          <label for="mob"><b>Mobile :</b></label>
          <input type="text" name="mob" class="mob" id="mob" value="<?php echo $mob; ?>" readonly />
        </div>
        
        <div class="type2">
          <label ><b>Middle Name :</b></label>
          <input type="text" name="fname" class="fname" id="fname" value="<?php echo $fname; ?>" readonly />
        </div>
      
        <div class="type2">
          <label for="Lname"><b>Last Name :</b></label>
          <input type="text" name="Lname" class="Lname" id="Lname" value="<?php echo $Lname; ?>" readonly />
        </div>
      </div>
      
      <p class="para">Issued Books</p>
      
      <table class="my-table" border="1">
        <thead>
          <tr>
            <th style="width: 42px;">S.No.</th>
            <th>Book Name</th>
            <th>Book Code</th>
            <th>Issue Date</th>
            <th style="width: 20px;"">Action</th>
          </tr>
        </thead>
        
        <tbody>
          <?php
            $sno=0;
			$sql1= "";
		    $sql1 = "SELECT book.bookname,issue.bookcode,issue.doc FROM`book`,`issue` WHERE issue.Student_No='$Stud_no' AND issue.bookcode=book.bookcode && issue.status='1'";
		    $run1 = mysqli_query($con, $sql1);
		    while($res = mysqli_fetch_assoc($run1))
		    {
				$sno = $sno+1;
				$datestore = $res['doc'];
    			$newvar = new DateTime($datestore);
	    		$ndate = $newvar->format('d-m-Y');
  	  		    echo '<tr>';
	  		      echo '<td>'.$sno.'</td>';
    		      echo '<td>'.$res['bookname'].'</td>';
				  echo '<td>'.$res['bookcode'].'</td>';
    		      echo '<td>'.$ndate.'</td>';
				  echo '<td><a href="book_return_details.php?var1='.$Stud_no.' && var2='.$res['bookcode'].'" style="font-size: 18px;">Return</a></td>';
		   	    echo '</tr>'; 
		    }
		  ?>
        </tbody>
      </table>
  
  <?php
	}
  ?>
  </div>
</div>



<script type="text/javascript">
function message() {
	alert("Data Recorded");
}
</script>
</body>
</html>
