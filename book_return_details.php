<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';
$adm = $_GET['var1'];
$bcod = $_GET['var2'];
?>

<!DOCTYPE html >
<html >
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
    <div class="head">
      <p class="head-para"><i class="fas fa-book-reader"></i>&ensp;RETURN BOOK</p>
    </div>
    
    <hr class="h1" />
  
  <?php
    $stname="";
    $clss="";
	$mob="";
	$fname="";
	$Lname="";
	$sql = "SELECT * FROM `student` WHERE Student_No='$adm'";
	$run = mysqli_query($con, $sql);
	while($row = mysqli_fetch_assoc($run))
    {
		$stname=$row['studentname'];
		$clss=$row['class'];
	    $mob=$row['mobile'];
	    $fname=$row['Middlename'];
	    $Lname=$row['LastName'];
	}
	
	$BookName="";
    $URcode="";
	$bkpub="";
	$bkaut="";
	$datestore="";
	$sql1 = "SELECT *,issue.bookcode,issue.doc FROM `book`,`issue` WHERE issue.bookcode='$bcod' && book.bookcode='$bcod'";
	$run1 = mysqli_query($con, $sql1);
	while($res = mysqli_fetch_assoc($run1))
    {
		$BookName=$res['bookname'];
        $URcode=$res['bookcode'];
		$bkpub=$res['publisher'];
	    $bkaut=$res['author'];
	    $datestore=$res['doc'];
	}
	$newvar = new DateTime($datestore);
	$ndate = $newvar->format('d-m-Y');
	
	$add=30;
	$ndt = date('d-m-Y',strtotime($ndate.'+ '.$add.' days'));
	$new = new DateTime($ndt);
	
	$currdt = date('d-m-Y');
	$newcurr = new DateTime($currdt);
	
	$diff = date_diff($new,$newcurr);

	$fine_form = $diff->format("%R%a");
  echo $fine_form;
	if($fine_form<=0) 
	{
		$fine=0;
	}
	else 
	{
		$fine=$fine_form*300;
	}
  ?>
      
    <form action="book_return_calculation.php" method="post" enctype="multipart/form-data" onsubmit="message();">
      <p class="para">Student Details</p>
      
      <div class="container-100">
        <div class="type2">
          <label for="name"><b>Student Name :</b></label>
          <input type="text" name="name" class="name" id="name" value="<?php echo $stname; ?>" readonly />
        </div>
       
        <div class="type2">
          <label for="admnum"><b>Student No. :</b></label>
          <input type="text" name="admnum" class="admnum" id="admnum" style="width:50%;" value="<?php echo $adm; ?>" readonly />
        </div>
        
        <div class="type2">
          <label for="class"><b>Major :</b></label>
          <input type="text" name="class" class="class" id="class" value="<?php echo $clss; ?>" readonly />
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
      
      <p class="para">Book Details</p>
      
      <div class="container-100">
        <div class="type2">
          <label for="bname"><b>Book Name :</b></label>
          <input type="text" name="bname" class="bname" id="bname" value="<?php echo $BookName; ?>" readonly />
        </div>
       
        <div class="type2">
          <label for="bcode"><b>Book Code :</b></label>
          <input type="text" name="bcode" class="bcode" id="bcode" value="<?php echo $URcode; ?>" readonly />
        </div>
        
        <div class="type2">
          <label for="aut"><b>Author :</b></label>
          <input type="text" name="aut" class="aut" id="aut" value="<?php echo $bkaut; ?>" readonly />
        </div>
      </div>
      
      <div class="container-100">
        <div class="type2">
          <label for="pub"><b>Publisher :</b></label>
          <input type="text" name="pub" class="pub" id="pub" value="<?php echo $bkpub; ?>" readonly />
        </div>
      
        <div class="type2">
          <label for="dt"><b>Issue Date :</b></label>
          <input type="text" name="dt" class="dt" id="dt" value="<?php echo $ndate; ?>" readonly />
        </div>
        
        <div class="type2">
          <label for="fine"><b>Fine :</b></label>
          <input type="text" name="fine" class="fine" id="fine" value="<?php echo $fine; ?>" readonly />
        </div>
      </div>
      
      <div class="button-div">
          <input type="submit" name="ok" class="ok" id="ok" value="Return" /> 
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
