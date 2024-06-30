<?php

if (isset($_GET["url"])) {

    $url = $_GET["url"];

if ($url === "signout.php") {
setcookie("user", "", time() - 3600);

header("location: index.php");

}
else {

    header("location: $url");

    }   
}
?>