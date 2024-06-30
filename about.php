<?php

if (isset($_COOKIE["user"])) {
  if (str_contains($_COOKIE["user"],"admin")) {
    $status = "administrator";
  }
  else {
    $status="";
  }
}  
$array = explode("-",$_COOKIE["user"]);
$admin = $array[1];
$user_id = $array[2];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About yrprey Tasks Python</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<link rel="icon" href="img/favicon.svg" title="YRprey">
</head>
<body>
  <?php


// Verifique se allow_url_fopen está habilitado

    include("navbar.php");

    if (isset($_GET["img"]) AND !empty($_GET["img"])) {
      $v = $_GET["img"];
    }
    else {
      $v = "logo.webp";
    }
  ?>
  <div class="container">
    <h1 class="mt-5">About yrprey Tasks Python</h1>

    <div class="card mt-3">
      <div class="card-body">
        <br><h5 class="card-title"><img src="img/<?php echo file_get_contents("http://localhost/head.php?img=$v"); ?>" width="180"></h5><br>
        <p>Find vulnerabilities in yrprey tasks.</p>
        <p>You can identify vulnerabilities through automated tools for dynamic, static, or library vulnerability analysis. <br><br>
            If you want to perform a manual vulnerability analysis, you can make malicious requests and then exploit the vulnerabilities.<br><br>
             If you want to perform a manual vulnerability analysis, you can manually identify vulnerabilities through Code Review, make code-level fixes, and then validate the mitigation.</p>
      </div>
    </div>

    <!-- Lista de Últimas Transações -->
   

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
