<?php
  require 'connect.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Header</title>
<link rel="stylesheet" href="CSS/Header.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
</head>

<body>

    <div class="container-header">
        <nav class="navbar">
             <a href="index.php">
            <div class="Logo" style="display:flex;">
                <img src="Image/logo.png" style="width:32px;margin-right: 6px;"></img>
                <h2 style="font-family: 'Kaushan Script', cursive;color: rgb(229, 118, 0);">Adobe Library</h2>
            </div>
            </a>
            <ul class="nav-links">

                <a href="index.php" class="nav-link" >Home</a>

                <div class="nav-link drop">
                    <a class="drop">
                       <!-- <span class="material-icons dropdown-icon">arrow_drop_down</span>-->
                        Students
                    </a>
                    <ul class="drop-down">
                        <a href="new_student.php">New Student</a>
                        <a href="student_list.php">Student List</a>
                    </ul>
                </div>

                <div class="nav-link drop">
                    <a class="drop">
                       <!-- <span class="material-icons dropdown-icon">arrow_drop_down</span>-->
                        Book
                    </a>
                    <ul class="drop-down">
                        <a href="new_book.php">New Book</a>
                        <a href="book_list.php">Book List</a>
                    </ul>
                </div>

                <div class="nav-link drop">
                    <a class="drop">
                       <!-- <span class="material-icons dropdown-icon">arrow_drop_down</span>-->
                        Issue
                    </a>
                    <ul class="drop-down">
                        <a href="book_issue.php">Issue Book</a>
                        <a href="issue_list.php">Issue List</a>
                    </ul>
                </div>

                <div class="nav-link drop">
                    <a class="drop">
                       <!-- <span class="material-icons dropdown-icon">arrow_drop_down</span>-->
                        Return
                    </a>
                    <ul class="drop-down">
                        <a href="book_return.php">Return Book</a>
                        <a href="return_list.php">Return List</a>
                    </ul>
                </div>

                    <a href="update_stock.php" class="nav-link">Stock Update</a>

            </ul>

            <a href="Login/logout.php" class="logout">logout</a>
        </nav>
    </div>

</body>
</html>
