<?php
$connect = mysqli_connect("localhost", "root", "", "roadnet");
$query = "SELECT eid, fname, lname, username, parish, role FROM employee ORDER BY eid DESC";
$result = mysqli_query($connect, $query);

session_start();

        if(!isset($_SESSION['admin_login'])) {
            header("location: ../login.php");
        }

        if(isset($_SESSION['parishmanager_login'])) {
            header("location: ../employee/parishmanager_home.php");
        }

        if(isset($_SESSION['director_login'])) {
            header("location: ../employee/director_home.php");
        }

        if(isset($_SESSION['staff_login'])) {
            header("location: ../employee/staff_home.php");
        }

        if(isset($_SESSION['admin_login'])) {
?>
            <?php
            $_SESSION['admin_login'];
        }
            ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    </head>

    <body>
        <nav class="nav bg-light p-2 m-1 navbar-expand-lg navbar-light" >
            <button id="button" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
              </button>
    
            <div class="row navbar-collapse collapse" id="navbar">
                
                <div class="col-6 p-2  offset-3 offset-lg-0 col-lg-2 order-1 order-lg-2">
                    <img src="phpimages\logo.png" class="img-fluid">
                </div>
    
                <div class="navbar-nav p-2  col-12 col-lg-5 d-flex order-lg-1 order-2">
                    <a href="\admin\admin_home.php" class="nav-link text-center">Home</a>
                    <a href="#" class="nav-link text-center">Reports</a>
                    <a href="#" class="nav-link text-center">Update</a>
                </div>
        
        
                <div class="navbar-nav p-2 col-12 col-lg-5 d-flex justify-content-end order-3">
                    <a href="#" class="nav-link text-center">About</a>
                    <a href="#" class="nav-link text-center">Contact</a>
                    <?php 
                    echo '<a href="#" class="nav-link text-center text-primary">'.$_SESSION['admin_login'].'</a>';
                    echo '<a href="/logout.php" class="nav-link text-center text-danger">Logout</a>';
                    ?>

                </div>
            </div>
        </nav>
        
        <div class="container">
            <table id="employee_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Employee ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Username</td>
                        <td>Parish</td>
                        <td>Role</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result)) {
                    echo '
                    <tr>
                        <td>'.$row["eid"].'</td>
                        <td>'.$row["fname"].'</td>
                        <td>'.$row["lname"].'</td>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["parish"].'</td>
                        <td>'.$row["role"].'</td>
                    </tr>
                    ';
                }
                ?>
            </table>
        </div>
    </body>
</html>

<script>
    $(document).ready(function() {
        $('#employee_data').DataTable();
    });
</script>