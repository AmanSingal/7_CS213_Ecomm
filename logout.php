<?php
session_destroy();
unset($_SESSION['emailid']);
unset($_SESSION['pass']);
header("location:main.php");
exit();
?>