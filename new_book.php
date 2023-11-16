<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';

if(isset($_POST['ok'])) 
{
	$bname=$_POST['name'];
	$bcode = $_POST['code'];
	$aut = $_POST['aname'];
	$publish = $_POST['pub'];
	$stck = $_POST['stk'];
	
	$sql = "INSERT INTO `book`(`bookname`,`bookcode`,`author`,`publisher`,`stock`) VALUES('$bname','$bcode','$aut','$publish','$stck')";
	$run = mysqli_query($con, $sql);
	
	$bknum=$_POST['bknum'];
	$bknum=$bknum+1;
	$query = "UPDATE `Settings` SET bookcode='$bknum'";
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
    <div class="head" style="background-color: darkcyan;">
      <p class="head-para"><i class="fas fa-book"></i>&ensp;NEW BOOK</p>
    </div>
    
    
    <?php
	  $bookCode="";
	  $sql1 = "SELECT * FROM `Settings`";
	  $run1 = mysqli_query($con, $sql1);
	  if($row1 = mysqli_fetch_assoc($run1))
	  {
		  $bookCode=  $row1['bookcode'];
	  }
	?>
    
    <form action="#" method="post" enctype="multipart/form-data" onsubmit="message();">
      <div class="container-100">
        <div class="type2">
          <label for="name"><b>Book Name :</b></label>
          <input type="text" name="name" class="name" id="name" />
        </div>
        
        <div class="type2">
          <label for="code"><b>Book Code :</b></label>
          <input type="text" name="code" class="code" id="code" value="<?php echo 'UR'.$bookCode; ?>" readonly />
        </div>
      
        <div class="type2">
          <label for="aname"><b>Author :</b></label>
          <input type="text" name="aname" class="aname" id="aname" />
        </div>
      </div>
      
      <div class="container-100">
        <div class="type2">
          <label for="pub"><b>Publisher :</b></label>
          <input type="text" name="pub" class="pub" id="pub" />
        </div>
        
        <div class="type2">
          <label for="stk"><b>Stock :</b></label>
          <input type="number" name="stk" class="stk" id="stk" />
        </div>
      
        <div class="type2"></div>
      </div>
      
      <div class="button-div">
          <input type="submit" name="ok" class="ok" id="ok" value="Submit" /> 
      </div>
      
      <input type="text" name="bknum" id="bknum" class="bknum" value="<?php echo $bookCode; ?>" style="display:none;" />
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
