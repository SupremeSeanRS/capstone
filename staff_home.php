<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <link rel="stylesheet" type="text/css" href="css\style.css"> -->
    

</head>
<body>
    <nav class="nav bg-light p-2 m-1 navbar-expand-lg navbar-light" >
        <button id="button" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
          </button>

        <div class="row navbar-collapse collapse" id="navbar">
            
            <div class="col-6 p-2  offset-3 offset-lg-0 col-lg-2 order-1 order-lg-2">
                <img src="images\logo.png" class="img-fluid">
            </div>

            <div class="navbar-nav p-2  col-12 col-lg-5 d-flex order-lg-1 order-2">
                <a href="#" class="nav-link text-center">Home</a>
                <a href="#" class="nav-link text-center">Reports</a>
                <a href="#" class="nav-link text-center">Update</a>
            </div>
    
    
            <div class="navbar-nav p-2 col-12   col-lg-5 d-flex justify-content-end order-3">
                <a href="#" class="nav-link text-center">About</a>
                <a href="#" class="nav-link text-center">Contact</a>
                <a href="#" class="nav-link text-center">Admin</a>
            </div>
        </div>

    </nav>

<div class="container">
    <h1>Staff Page</h1>

    <h3>
        <?php
        session_start();

        if(!isset($_SESSION['staff_login'])) {
            header("location: ../index.php");
        }

        if(isset($_SESSION['parishmanager_login'])) {
            header("location: ../employee/parishmanager_home.php");
        }

        if(isset($_SESSION['admin_login'])) {
            header("location: ../admin/admin_home.php");
        }

        if(isset($_SESSION['director_login'])) {
            header("location: ../employee/director_home.php");
        }

        if(isset($_SESSION['staff_login'])) {
            ?>
            Welcome,
            <?php
            echo $_SESSION['staff_login'];
        }
        ?>
    </h3>
    <a href="../logout.php">Logout</a>
<div>
    </body>
    </html>