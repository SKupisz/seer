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
      <?php
      if(isset($_SESSION['query_fail']))
      {
        ?><div class = "failure">
          <?php echo $_SESSION['query_fail'];?>
        </div><?php
        unset($_SESSION['query_fail']);
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
        ?><section class = "table-row">
          <div class = "table-elChoose">
            <input type="checkbox"/>
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
  ?>
  <section class = "insert">
    <header class = "insert-header">
      Insert
    </header>
  </section>
  </body>
  <script src = "./src/js/table.js"></script>
</html>
