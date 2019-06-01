<?php
session_start();
if(!isset($_POST['hst']) || !isset($_POST['user']) || !isset($_POST['dbname']))
{
  header("Location: ../../");
  exit();
}
$host = $_POST['hst'];
$user = $_POST['user'];
$dbname = $_POST['dbname'];
if(!isset($_POST['pass']))
{
  $pass = "";
}
else {
  $pass = $_POST['pass'];
}
try {
  $polaczenie = new mysqli($host,$user,$pass,$dbname);
  if($polaczenie->connect_errno != 0)
  {
    throw new Exception($polaczenie->connect_error);
  }
  else {
    $_SESSION['host'] = $host;
    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $pass;
    $_SESSION['dbname'] = $dbname;
    header("Location: ../../main.php");
    exit();
  }

} catch (Exception $e) {
  $_SESSION['connection_error'] = "Sorry, something went wrong. Try later";
  header("Location: ../../");
  exit();
}

?>
