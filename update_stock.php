<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';

if(isset($_POST['ok'])) 
{
	$URcode=$_POST['code'];
	$bkstk1=$_POST['stk'];
	$bkstk2=$_POST['upd'];
	$updatestock=$bkstk1+$bkstk2;
	
	$sql1 = "UPDATE `book` SET stock='$updatestock' WHERE bookcode='$URcode'";
    $run1 = mysqli_query($con, $sql1);
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
    <div class="head" style="background-color: black;">
      <p class="head-para"><i class="fas fa-layer-plus"></i>&ensp;STOCK UPDATE</p>
    </div>
    
    <hr class="h1" />
    
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="container-50">
        <div class="type1-2">
          <label for="bookno"><i>Book Code :</i>&ensp; <B>UR</B></label>
          <input type="text" name="bookno" class="bookno" id="bookno" style="width: 150px;display: inline;"/>&emsp;
          <input type="submit" name="search" class="search" id="search" value="Search" />
        </div>
      </div>
    </form>
      
  <?php
    if(isset($_POST['search'])) 
	{
    $BookName = '';
		$URcode='UR' . $_POST['bookno'];
		$aut="";
		$publ="";
		$stck="";
		$sql = "SELECT * FROM `book` WHERE bookcode='$URcode'";
		$run = mysqli_query($con, $sql);

    if(mysqli_num_rows($run) == 0){
      return ;
    }

		if($row = mysqli_fetch_assoc($run))
	    {
        $BookName = $row['bookname'];
			$URcode=$row['bookcode'];
			$aut=$row['author'];
		    $publ=$row['publisher'];
		    $stck=$row['stock'];
		}
  ?>
  
    <form action="#" method="post" enctype="multipart/form-data" onsubmit="message();" >
      <p class="para">Book Details</p>
      
      <div class="container-100">
        <div class="type2">
          <label for="name">Book Name :</label>
          <input type="text" name="name" class="name" id="name" value="<?php echo $BookName; ?>" readonly />
        </div>
       
        <div class="type2">
          <label for="code">Book Code :</label>
          <input type="text" name="code" class="code" id="code" value="<?php echo $URcode; ?>" readonly />
        </div>
      
        <div class="type2">
          <label for="aname">Author :</label>
          <input type="text" name="aname" class="aname" id="aname" value="<?php echo $aut; ?>" readonly />
        </div>
      </div>
      
      <div class="container-100">
        <div class="type2">
          <label for="pub">Publisher :</label>
          <input type="text" name="pub" class="pub" id="pub" value="<?php echo $publ; ?>" readonly />
        </div>
        
        <div class="type2">
          <label for="stk">Stock :</label>
          <input type="number" name="stk" class="stk" id="stk" value="<?php echo $stck; ?>" readonly />
        </div>
      
        <div class="type2"></div>
      </div>
      
      <p class="para">Update Stock</p>
      <div class="container-100">

        <div class="type2">
          <label for="upd">Stock :</label>
          <input type="number" name="upd" class="upd" id="upd" />
        </div>

      </div>

      <div class="button-div">
          <input type="submit" name="ok" class="ok" id="ok" value="Submit" /> 
      </div>

    </form>
    
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
