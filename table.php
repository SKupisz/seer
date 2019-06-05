<?php
require_once "./src/logic/loadTableData.php";
?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MinRap</title>
    <link rel="stylesheet" href = "./src/css/main/table.css"/>
  </head>
  <body>
    <section class = "control-panel">
      <button class = "panel-item showing-recordsBtn">
        Show
      </button>
      <button class = "panel-item structureBtn">
        Structure
      </button>
      <button class = "panel-item consoleBtn">
        SQL console
      </button>
      <button class = "panel-item insertBtn">
        Insert
      </button>
      <a href = "./main.php" class = "goBack">
      <button class = "panel-item">
        Go back
      </button>
      </a>
      <a href = "./src/logic/end.php">
      <button class = "panel-item closeBtn">
        Close connection
      </button>
    </a>

      <?php
      if(isset($_SESSION['query_fail']))
      {
        ?><div class = "failure">
          <?php echo $_SESSION['query_fail'];?>
        </div><?php
        unset($_SESSION['query_fail']);
      }
      if(isset($_SESSION['insert_fail']))
      {
        ?><div class = "failure">
          <?php echo $_SESSION['insert_fail'];?>
        </div><?php
        unset($_SESSION['insert_fail']);
      }
      if(isset($_SESSION['del_fail']))
      {
        ?><div class = "failure">
          <?php echo $_SESSION['del_fail'];?>
        </div><?php
        unset($_SESSION['del_fail']);
      }
      if(isset($_SESSION['copy_fail']))
      {
        ?><div class = "failure">
          <?php echo $_SESSION['copy_fail'];?>
        </div><?php
        unset($_SESSION['copy_fail']);
      }
      ?>
    </section>
    <section class = "showing-records">
    <section class = "title-row">
      <div class = "table-headerSigning">
        Sign
      </div>
    <?php
      for($i = 0 ; $i < $howMany; $i++)
      {
        ?><div class = "table-header">
          <?php echo $titles[$i];
          ?></div><?php
      }?></section><?php
      for($i = 0 ; $i < count($dataArray); $i++)
      {
        $now = $dataArray[$i];
        $toGo = $pri[$primaryKeyNumber];
        ?><section class = "table-row">
          <div class = "table-elChoose">
            <input type="checkbox" onclick = "toModify(<?php echo $now[$primaryKey];?>)" name = "modyfingCheckbox" class = "modyfingCheckbox" id = "mod<?php echo $now[$primaryKey];?>"/>
          </div><?php
        for($j = 0 ; $j < $howMany; $j++)
        {
          $toShow = $now[$titles[$j]];
          if(strlen($toShow) > 20)
          {
            $toShow = substr($toShow,0,20)."...";
          }
          ?>
          <div class = "table-el">
              <div class = "table-elextended">
                <?php echo $now[$titles[$j]];?>
              </div>
              <div class = "table-elnormal">
                <?php echo $toShow;?>
              </div>
          </div>
          <?php
        }
        ?></section><?php
      }
    ?>
  </section>
  <?php
  require_once "./src/components/tableSupport/showing.php";
  require_once "./src/components/tableSupport/queries.php";
  require_once "./src/components/tableSupport/insert.php";
  ?>
  <section class = "table-menu">
    <form method="post" action = "./src/logic/modifyRows.php?tbn=<?php echo $name;?>">
      <input type = "hidden" class = "prikey" name = "prikey" value = "<?php echo $primaryKey;?>"/>
      <input type="hidden" class = "dataForModify" name = "dataForModify"/>
      <button type="button" class = "submit-Rowsbutton sign-AllBtn">
        Sign all
      </button>
      <button type = "submit" class = "submit-Rowsbutton" name = "delete">
        Delete
      </button>
      <button type = "submit" class = "submit-Rowsbutton" name = "copy">
        Copy
      </button>
    </form>
  </section>
  </body>
  <script src = "./src/js/table.js"></script>
</html>
