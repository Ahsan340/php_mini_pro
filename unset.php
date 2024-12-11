<?php
session_start();
unset($_SESSION['cart']);
 echo "<script>location.assign('index.php')</script>";
?>