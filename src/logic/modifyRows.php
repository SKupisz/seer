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

if(isset($_POST['dataForModify']) && isset($_POST['prikey']))
{
  $data = $_POST['dataForModify'];
  $pri = $_POST['prikey'];
  $data = substr($data,0,strlen($data)-1);
  $newData = explode(";",$data);

  if(isset($_POST['delete']))
  {
    require_once "../components/logicSupport/connectionData.php";
    try {
      $connection = new mysqli($host,$db_user,$db_password,$db_name);
      if($connection->connect_errno != 0)
      {
        throw new Exception($connection->connect_error);
      }
      else {
        for($i = 0 ; $i < count($newData); $i++)
        {
          $nowPri = $newData[$i];
          $sql = "DELETE FROM $name WHERE $pri = $nowPri";
          $query = $connection->query($sql);
          if(!$query) throw new Exception($connection->error);
        }
        header("Location: ../../table.php?tbn=".$_GET['tbn']);
        exit();
      }
    } catch (Exception $e) {
      $_SESSION['del_fail'] = "Something went wrong. Try later";
      header("Location: ../../table.php?tbn=".$_GET['tbn']);
      exit();
    }

  }
  else if(isset($_POST['copy']))
  {
    require_once "../components/logicSupport/connectionData.php";
    try {
      $connection = new mysqli($host,$db_user,$db_password,$db_name);
      if($connection->connect_errno != 0)
      {
        throw new Exception($connection->connect_error);
      }
      else {
        $rowsNames = $connection->query("DESCRIBE $name");
        if(!$rowsNames) throw new Exception($connection->error);
        $howMany = $rowsNames->num_rows;
        $namesTable = Array();
        $namesTypes = Array();
        for($i = 0 ; $i < $howMany; $i++)
        {
          $row = $rowsNames->fetch_array();
          $namesTable[$i] = $row[0];
          $namesTypes[$i] = $row[1];
        }
        for($i = 0 ; $i < count($newData); $i++)
        {
          $nowPri = $newData[$i];
          $data = $connection->query("SELECT * FROM $name WHERE $pri = $nowPri");
          if(!$data) {
            echo count($newData);
            stop();
          }
          if($data->num_rows == 0)
          {
            $_SESSION['copy_fail'] = "Error: column you want to copy does not exist";
            header("Location: ../../table.php?tbn=".$_GET['tbn']);
            exit();
          }
          $valuesForSend = "";
          $dataFetched = $data->fetch_assoc();
          for($j = 0 ; $j < $howMany; $j++)
          {
            $nowCol = $namesTable[$j];
            $nowType = $namesTypes[$j];
            if(strlen($dataFetched[$nowCol]) == 0 && $nowCol != $pri)
            {
              $valuesForSend.="";
            }
            else if($nowCol == $pri)
            {
              $valuesForSend.= "NULL";
            }
            else if($nowType != "text")
            {
              $valuesForSend.=$dataFetched[$nowCol];
            }
            else {
              $valuesForSend.="'".$dataFetched[$nowCol]."'";
            }
            if($j < $howMany-1)
            {
              $valuesForSend.=", ";
            }
          }
          $sql = "INSERT INTO $name VALUES($valuesForSend)";
          $execute = $connection->query($sql);
          if(!$execute) throw new Exception($connection->error);

        }
        header("Location: ../../table.php?tbn=".$name);
        exit();
      }
    } catch (Exception $e) {
      $_SESSION['copy_fail'] = "Something went wrong. Try later";
      header("Location: ../../table.php?tbn=".$_GET['tbn']);
      exit();
    }
  }
  else {
    header("Location: ../../table.php?tbn=".$_GET['tbn']);
    exit();
  }
}
else {
  header("Location: ../../table.php?tbn=".$_GET['tbn']);
  exit();
}
?>
