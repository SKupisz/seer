<?php
session_start();
if(!(isset($_SESSION['host']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['dbname'])))
{
  header("Location: index.php");
  exit();
}
if(!isset($_GET['tbn']))
{
  header("Location: main.php");
  exit();
}
$name = $_GET['tbn'];
$host = $_SESSION['host'];
$db_user = $_SESSION['user'];
$db_password = $_SESSION['pass'];
$db_name = $_SESSION['dbname'];
$typesTranslation = ["int(11)"=>"number","text"=>"text"];
$conn = 1;
try {
  $connection = new mysqli($host,$db_user,$db_password,$db_name);
  if($connection->connect_errno != 0)
  {
    throw new Exception($polaczenie->connect_error);
  }
  else {
    $query = $connection->query("DESCRIBE $name");
    if(!$query) throw new Exception($connection->error);
    $howMany = $query->num_rows;
    $titles = Array();
    $null = Array();
    $types = Array();
    $default = Array();
    $extra = Array();
    for($i = 0 ; $i < $howMany; $i++)
    {
      $row = $query->fetch_array();
      $titles[$i] = $row[0];
      $types[$i] = $row[1];
      $null[$i] = $row[2];
      $pri[$i] = $row[3];
      $default[$i] = $row[4];
      $extra[$i] = $row[5];
    }
    if(!isset($_SESSION['query_response']))
    {
      $query = $connection->query("SELECT * FROM $name");
      if(!$query) throw new Exception($connection->error);
      $dataArray = Array();
      $rows = $query->num_rows;
      for($i = 0 ; $i < $rows; $i++)
      {
        $row = $query->fetch_assoc();
        $dataArray[$i] = $row;
      }
    }
    else {
      $dataArray = $_SESSION['query_response'];
      unset($_SESSION['query_response']);
    }

  }
} catch (Exception $e) {
  $conn = 0;
}

?>
