<?php
session_start();
if(!(isset($_SESSION['host']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['dbname'])))
{
  header("Location: index.php");
  exit();
}
$host = $_SESSION['host'];
$db_user = $_SESSION['user'];
$db_password = $_SESSION['pass'];
$db_name = $_SESSION['dbname'];
$conn = 1;
try {
  $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
  if($polaczenie->connect_errno != 0)
  {
    throw new Exception($polaczenie->connect_error);
  }
  else {
    $query = $polaczenie->query("SELECT table_name FROM information_schema.tables WHERE table_schema ='$db_name'");
    if(!$query) throw new Exception($polaczenie->error);
    $howMany = $query->num_rows;
    $names = Array();
    for($i = 0 ; $i < $howMany; $i++)
    {
      $row = $query->fetch_assoc();
      $names[$i] = $row['table_name'];
    }
    
  }
} catch (Exception $e) {
  $conn = 0;
  echo "fucked up";
}
?>
