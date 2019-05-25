<?php
session_start();
unset($_SESSION['host']);
unset($_SESSION['user']);
unset($_SESSION['pass']);
unset($_SESSION['dbname']);
header("Location: ../../");
exit()
?>
