<?php
include 'db.php';
session_start();
session_destroy();
header('Location: signin.php');
?>
