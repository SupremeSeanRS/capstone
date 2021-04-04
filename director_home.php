<div class="container">
    <h1>Director Page</h1>

    <h3>
        <?php
        session_start();

        if(!isset($_SESSION['director_login'])) {
            header("location: ../index.php");
        }

        if(isset($_SESSION['parishmanager_login'])) {
            header("location: ../employee/parishmanager_home.php");
        }

        if(isset($_SESSION['admin_login'])) {
            header("location: ../admin/admin_home.php");
        }

        if(isset($_SESSION['staff_login'])) {
            header("location: ../employee/staff_home.php");
        }

        if(isset($_SESSION['director_login'])) {
            ?>
            Welcome,
            <?php
            echo $_SESSION['director_login'];
        }
        ?>
    </h3>
    <a href="../logout.php">Logout</a>
<div>