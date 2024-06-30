<?php
  ob_start();
  session_start();
  error_reporting(1);

  if (isset($_COOKIE["user"])) {
    exit(header("location: home.php"));
  }  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yrprey - Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(30,31,34);
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .login-container {
            background-color: rgb(64,66,73);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            text-align: center;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
<link rel="icon" href="img/favicon.svg" title="YRprey">    
</head>
<body>

<div class="container">
    <div class="login-container">
    <?php

include("db.php");

if (isset($_POST["login"])) {

  $username = $_POST["name"];
  $password = $_POST["password"];
  $password = base64_encode($password);

$query  = "SELECT * FROM user where name='" . $username . "'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$row = mysqli_num_rows($result);

if ($row > 0) {

    $query  = "SELECT * FROM user where name='" . $username . "' AND password='".$password."'";

    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

    $exist = mysqli_num_rows($result);

    if ($exist > 0) {

        $rw = mysqli_fetch_assoc($result);
    
        $user_id = $rw["id"];
        $permission = $rw["permission"];

        $tempo_expiracao = time() + 3600;
        $cookie =  $tempo_expiracao."-".$permission."-".$user_id;

        setcookie("user", $cookie, $tempo_expiracao);

        exit(header("location: home.php"));

    }
    else {

        print '<br><div class="alert alert-danger" role="alert">
        Password invalid!
      </div>';        

    }

}
else {
  print '<br><div class="alert alert-danger" role="alert">
  Credentials invalid!
</div>';
} 

}
?>                
        <br><br>
        <img src="https://yrprey.com/assets/images/logo-letter.svg" class="img-fluid mb-4" alt="Placeholder Image">
        <br><br>
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Enter username" name="name">
            </div><br>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #ff1a56; border: #ff1a56; height:40px;" name="login">Login</button>
        </form>
    </div>
</div>

<footer class="footer">
    <p>Copyright &copy; 2024. All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
