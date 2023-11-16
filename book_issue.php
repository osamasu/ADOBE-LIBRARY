<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';

if(isset($_POST['ok'])) 
{
	$adm_no=$_POST['admnum'];
  $b_name = $_POST['bname'];
	$URcode=$_POST['code'];
	$sql1 = "INSERT INTO `issue`(`Student_No`,`bookcode`,`status`) VALUES ('$adm_no','$URcode','1')";
    $run1 = mysqli_query($con, $sql1);
	
	$sql2 = "SELECT stock FROM `book` WHERE bookcode='$URcode'";
    $run2 = mysqli_query($con, $sql2);

    $stnumber = 0;
	while($row2 = mysqli_fetch_assoc($run2))
	{
		$stnumber=$row2['stock'];
    break;
	}
	$stnumber=$stnumber-1;
	
	$sql3 = "UPDATE `book` SET stock='$stnumber' WHERE bookcode='$URcode'";
    $run3 = mysqli_query($con, $sql3);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Library Management</title>
<link rel="stylesheet" href="CSS/form_page.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,800|Lato:300,400,700,400italic,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="./JS/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function()
{
	$("#bname").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
		$.ajax
		({
			type: "POST",
			url: "fetch.php",
			data: dataString,
			cache: false,
			success: function(value)
			{
				var data = value.split("@");
				$('#code').val(data[0]);
				$('#aname').val(data[1]);
				$('#pub').val(data[2]);
				$('#stk').val(data[3]);
		    }
		});
	});
});
</script></head>

<body>
  <?php
    require 'Header.php';
  ?>
  
  <div class="main-form">
    <div class="head" style="background-color: #0bdc08;">
      <p class="head-para"><i class="fas fa-book-reader"></i>&ensp;ISSUE BOOK</p>
    </div>
    
    <hr class="h1" />
    
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="container-50">
        <div class="type1-2">
          <label for="admno">Student No. :&ensp;<b>ST</b></label>
          <input type="number" name="admno" class="admno" id="admno" />&emsp;
          <input type="submit" name="search" class="search" id="search" value="Search" />
        </div>
      </div>
    </form>
      
  <?php
    if(isset($_POST['search'])) 
	{
		$adnum=  "ST" . $_POST['admno'];
		$stname="";
		$clss="";
		$mob="";
		$fname="";
		$Lname="";
		$sql = "SELECT * FROM `student` WHERE Student_No ='$adnum'";
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
  
    <form action="#" method="post" enctype="multipart/form-data" onsubmit="message();">
	  <p class="para">Student Details</p>
			 
	  <div class="container-100">
        <div class="type2">
          <label for="name"><b>Student Name :</b></label>
          <input type="text" name="name" class="name" id="name" value="<?php echo $stname; ?>" readonly />
        </div>
       
        <div class="type2">
          <label for="admnum"><b>Student No. :</b></label>
          <input type="text" name="admnum" class="admnum" id="admnum" style="width:50%;" value="<?php echo $adnum; ?>" readonly />
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
          <select name="bname" class="cls" id="bname">
            <option value="" disabled selected hidden>Choose Book</option>
            <?php
		      $query = "SELECT bookname , bookcode FROM `book` WHERE stock > 0 ";
		      $y = mysqli_query($con, $query);
		      while($res = mysqli_fetch_assoc($y))
	          {
				  echo '<option>'.$res['bookname'].'</option>';
            }
		    ?>
          </select>
        </div>
    
        <div class="type2">
          <label for="code"><b>Book Code :</b></label>
          <input type="text" name="code" class="code" id="code" readonly />

        </div>
      
        <div class="type2">
          <label for="aname"><b>Author :</b></label>
          <input type="text" name="aname" class="aname" id="aname" readonly />
        </div>
      </div>
      
      <div class="container-100">
        <div class="type2">
          <label for="pub"><b>Publisher :</b></label>
          <input type="text" name="pub" class="pub" id="pub" readonly />
        </div>
        
        <div class="type2">
          <label for="stk"><b>Stock :</b></label>
          <input type="number" name="stk" class="stk" id="stk" readonly />
        </div>
      
        <div class="type2"></div>
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
