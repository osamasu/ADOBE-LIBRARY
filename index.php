<?php
session_start();
if($_SESSION['Status']!="Active") {
	header("Location: Login/login_page.php");
}
$usid=$_SESSION['userid'];

require 'connect.php';

$row_count1="SELECT 'Student_No' FROM `student`";
$run1=mysqli_query($con, $row_count1);
$row1=mysqli_num_rows($run1);

$row_count2="SELECT 'bookcode' FROM `book`";
$run2=mysqli_query($con, $row_count2);
$row2=mysqli_num_rows($run2);

$row_count3="SELECT `Student_No` FROM `issue` WHERE status = 1";
$run3=mysqli_query($con, $row_count3);
$row3=mysqli_num_rows($run3);

$row_count4="SELECT 'Student_No' FROM `return` INNER JOIN book ON return.bookcode = book.bookcode";
$run4=mysqli_query($con, $row_count4);
$row4=mysqli_num_rows($run4);
?>

<!DOCTYPE html>
<html>
<head>
<title>Adobe Library</title>
<link rel="stylesheet" href="CSS/index.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,800|Lato:300,400,700,400italic,900' rel='stylesheet' type='text/css'>
</head>

<body>
  <?php
    require 'Header.php';
  ?>

    <section id="banner">
        <div class="banner-text">
          <h1>Adobe Library</h1>
          <p>Remanage your Style is Changing your Life.</p>   
        </div>
    </section>
    
    <div class="container">
        <div class="divider">
      <a href="student_list.php">
          <div class="box" id="box1">
              <img class="box_img" src="Image/students.png"></img>
            <div class="box-content">
              <p class="box-para">Students</p>
              <p class="count"><?php echo $row1; ?></p>
            </div>
          </div>
        </a>
      </div>
      
      <div class="divider">
        <a href="book_list.php">
          <div class="box" id="box2">
                        <img class="box_img" src="Image/Book.png"></img>
            <div class="box-content">
              <p class="box-para">Books</p>
              <p class="count"><?php echo $row2; ?></p>
            </div>
          </div>
        </a>
      </div>
      
      <div class="divider">
        <a href="issue_list.php">
          <div class="box" id="box3">
                        <img class="box_img" src="Image/literature.png"></img>
            <div class="box-content">
              <p class="box-para">Books Issued</p>
              <p class="count"><?php echo $row3; ?></p>
            </div>
          </div>
        </a>
      </div>
      
      <div class="divider">
        <a href="return_list.php">
          <div class="box" id="box4">
                        <img class="box_img" src="Image/return.png"></img>
            <div class="box-content">
              <p class="box-para">Books Returned</p>
              <p class="count"><?php echo $row4; ?></p>
            </div>
          </div>
        </a>
      </div>


      <div class="divider">
        <a href="new_student.php">
          <div class="box" id="box5">
            <div class="box-content">
              <img src="Image/NewStudent.png" style="width:50px;"></img>
              <p class="box-para">New Student</p>
            </div>
          </div>
        </a>
      </div>
      

      <div class="divider">
        <a href="new_book.php">
          <div class="box" id="box6">
            <div class="box-content">
                        <img src="Image/NewBook.png" style="width:50px;"></img>
              <p class="box-para">New Book</p>
            </div>
          </div>
        </a>
      </div>
      

      <div class="divider">
        <a href="book_issue.php">
          <div class="box" id="box7">
            <div class="box-content">
                        <img src="Image/IssueBook.png" style="width:50px;"></img>
              <p class="box-para">Issue Book</p>
            </div>
          </div>
        </a>
      </div>
      

      <div class="divider">
        <a href="book_return.php">
          <div class="box" id="box8">
            <div class="box-content">
                        <img src="Image/ReturnBook2.png" style="width:50px;"></img>
              <p class="box-para">Return Book</p>
            </div>
          </div>
        </a>
      </div>
      

      <div class="divider">
        <a href="update_stock.php">
          <div class="box" id="box9">
            <div class="box-content">
                        <img src="Image/StockUpdate.png" style="width:50px;"></img>
              <p class="box-para">Stock Update</p>
            </div>
          </div>
        </a>
      </div>
      
    </div>

</body>
</html>
