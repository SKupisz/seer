<?php
session_start();
if(!(isset($_SESSION['host']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['dbname'])))
{
  header("Location: ../../index.php");
  exit();
}
if(!isset($_POST['tableName']))
{
  header("Location: ../../main.php");
  exit();
}
$tableName = $_POST['tableName'];
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
    $query = $connection->query("DESCRIBE $tableName");
    if(!$query) throw new Exception($connection->error);
    $howMany = $query->num_rows;
    $titles = "";
    for($i = 0 ; $i < $howMany; $i++)
    {
      $row = $query->fetch_array();
      $forNow = $row[0];

      if(strlen($_POST[$forNow]) == 0 && $row[3] != "PRI")
      {
        $titles.="";
      }
      else if(strlen($_POST[$forNow]) == 0 && $row[3] == "PRI")
      {
        $titles.= "NULL";
      }
      else {
        $titles.="'".$_POST[$forNow]."'";
      }
      if($i < $howMany-1)
      {
        $titles.=", ";
      }
    }

    $sql = "INSERT INTO $tableName VALUES ($titles)";
    $query = $connection->query($sql);
    if(!$query) throw new Exception($connection->error);
    mysqli_close($connection);
    header("Location: ../../table.php?tbn=".$tableName);
    exit();
  }
} catch (Exception $e) {
  $_SESSION['insert_fail'] = "Something went wrong. Try later";
  header("Location: ../../table.php?tbn=".$tableName);
  exit();
}

?>
