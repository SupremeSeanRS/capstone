<?php
$connect = mysqli_connect("localhost", "root", "", "roadnet");
$query = "SELECT eid, fname, lname, username, parish, role FROM employee ORDER BY eid DESC";
$result = mysqli_query($connect, $query);
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

            <img src='logo.png' class='img-fluid'>
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