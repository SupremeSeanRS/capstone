<?php

require_once 'connection.php';

session_start();

if(isset($_SESSION["admin_login"])) {
    header("location: admin/admin_home.php");
}

if(isset($_SESSION["parishmanager_login"])) {
    header("location: employee/parishmanager_home.php");
}

if(isset($_SESSION["director_login"])) {
    header("location: employee/director_home.php");
}

if(isset($_SESSION["staff_login"])) {
    header("location: employee/employee_home.php");
}

if(isset($_REQUEST['btn_login'])) {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $role = $_REQUEST["role"];

    if(empty($username)) {
        $errorMsg[] = "Please enter username";
    }
    else if(empty($password)) {
        $errorMsg[] = "Please enter password";
    }
    else if(empty($role)) {
        $errorMsg[] = "Please select your role";
    }
    else if($username AND $password AND $role) {
        try {
            $select_stmt = $db->prepare("SELECT username, password, role FROM employee WHERE username=:uuser AND password=:upass AND role=:urole");
            $select_stmt->bindParam(":uuser", $username);
            $select_stmt->bindParam(":upass", $password);
            $select_stmt->bindParam(":urole", $role);
            $select_stmt->execute();

            while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) {
                $dbuser = $row["username"];
                $dbpassword = $row["password"];
                $dbrole = $row["role"];
            }

            if($username!=null AND $password!=null AND $role!=null) {
                if($select_stmt->rowCount()>0) {
                    if($username==$dbuser AND $password==$dbpassword AND $role==$dbrole) {
                        switch($dbrole) {
                            case "Admin";
                            $_SESSION["admin_login"]=$username;
                            $loginMsg="Admin has been successfully logged in.";
                            echo '<div class="alert alert-success" role="alert">';
                            echo $loginMsg;
                            echo '</div>';
                            header("refresh:0.9;admin/admin_home.php");
                            break;

                            case "Parish Manager";
                            $_SESSION["parishmanager_login"]=$username;
                            $loginMsg="Parish Manager has been successfully logged in.";
                            echo '<div class="alert alert-success" role="alert">';
                            echo $loginMsg;
                            echo '</div>';
                            header("refresh:0.9;employee/parishmanager_home.php");
                            break;

                            case "Director";
                            $_SESSION["director_login"]=$username;
                            $loginMsg="Director has been successfully logged in.";
                            echo '<div class="alert alert-success" role="alert">';
                            echo $loginMsg;
                            echo '</div>';
                            header("refresh:0.9;employee/director_home.php");
                            break;

                            case "Staff";
                            $_SESSION["staff_login"]=$username;
                            $loginMsg="Staff has been successfully logged in.";
                            echo '<div class="alert alert-success" role="alert">';
                            echo $loginMsg;
                            echo '</div>';
                            header("refresh:0.9;employee/staff_home.php");
                            break;

                            default:
                            $errorMsg[]="Wrong email or password or role";
                            echo '<div class="alert alert-danger" role="alert">';
                            echo 'Incorrect credentials. Please try again.';
                            echo '</div>';
                        }
                    }
                    else {
                        $errorMsg[]="Wrong email or password or role";
                        echo '<div class="alert alert-danger" role="alert">';
                        echo 'Incorrect credentials. Please try again.';
                        echo '</div>';
                    }
                }
                else {
                    $errorMsg[]="Wrong email or password or role";
                    echo '<div class="alert alert-danger" role="alert">';
                    echo 'Incorrect credentials. Please try again.';
                    echo '</div>';
                }
            }
            else {
                $errorMsg[]="Wrong email or password or role";
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Incorrect credentials. Please try again.';
                echo '</div>';
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }
    else {
        $errorMsg[]="Wrong username or password or role";
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Incorrect credentials. Please try again.';
        echo '</div>';
    }
}
?>