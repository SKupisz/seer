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
if(!isset($_POST['query']))
{
  header("Location: ../../table.php?tbn=".$_GET['tbn']);
  exit();
}
$queryContent = $_POST['query'];
$queryContent = trim($queryContent);
$name = $_GET['tbn'];
$host = $_SESSION['host'];
$db_user = $_SESSION['user'];
$db_password = $_SESSION['pass'];
$db_name = $_SESSION['dbname'];
try {
  $connection = new mysqli($host,$db_user,$db_password,$db_name);
  if($connection->connect_errno != 0)
  {
    throw new Exception($connection->connect_error);
  }
  else {
    $query = $connection->query($queryContent);
    if(!$query) throw new Exception($connection->error);
    $data = Array();
    $count = $query->num_rows;
    if($count > 0)
    {
      for($i = 0 ; $i < $count; $i++)
      {
        $data[$i] = $query->fetch_assoc();
      }
      $_SESSION['query_response'] = $data;
    }

    mysqli_close();
    header("Location: ../../table.php?tbn=".$name);
    exit();
  }
} catch (Exception $e) {
  $_SESSION['query_fail'] = "Query failed. Try later";
  header("Location: ../../table.php?tbn=".$name);
  exit();
}

?>
