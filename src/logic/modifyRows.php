<?php
session_start();
if(!(isset($_SESSION['host']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['dbname'])))
{
  header("Location: ../../");
  exit();
}
if(!isset($_GET['tbn']))
{
  header("Location: ../../main.php");
  exit();
}
if(isset($_POST['delete']))
{
  
}
else if(isset($_POST['edit']))
{

}
else {
  header("Location: ../../table.php?tbn=".$_GET['tbn']);
  exit();
}
?>
