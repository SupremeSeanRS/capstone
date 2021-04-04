<?php 

require 'testing2.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <title>Report Page</title>
 
  <link rel="stylesheet" type="text/css" href="css\style.css">

</head>

<body>
<form method="POST" class="form-horizontal">

<div class="form-group">
    <label class="col-sm-3 control-label">Username</label>
    <div class="col-sm-6">
        <input type="text" name="username" class="form-control" placeholder="Enter username"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Password</label>
    <div class="col-sm-6">
        <input type="password" name="password" class="form-control" placeholder="Enter password"/>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 control-label">Select Role</label>
    <div class="col-sm-6">   
        <select class="form-control" id="loginRole" name="role">
          <option selected disabled> -- Please select your role -- </option>
          <option value="Admin">Admin</option>
          <option value="Director">Director</option>
          <option value="Parish Manager">Parish Manager</option>
          <option value="Staff">Staff</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9 m-t-15">
        <input type="submit" name="btn_login" class="btn btn-success" value="Login">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9 m-t-15">
        You don't have an account register here? <a href="register.php"><p class="text-info">Register Account</p></a>
    </div>
</div>

</form>
</body>

</html>


