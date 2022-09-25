<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION['session']);
unset($_SESSION['id']);
header("Location:../index.php");
?>