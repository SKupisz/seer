<?php
require_once "./src/logic/loadTables.php";
?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MinRap</title>
    <link rel="stylesheet" href = "./src/css/main/main.css"/>
  </head>
  <body>
    <nav class = "menu">
      <a href = "./src/logic/end.php">
      <button class = "menu-item close">
        Close connection
      </button>
    </a>
    </nav>
    <main class = "main-content">
      <?php
      if($conn == 0)
      {
        ?><div class = "wrong-connection">
          Sorry, something went wrong. Try later
        </div><?php
      }
      else {
        ?>
        <header class = "main-header">
          All tables
        </header>
        <section class = "table-rows">
        <?php
        for($i = 0 ; $i < $howMany; $i++)
        {
          ?>
          <form method="post" action = "./table.php?tbn=<?php echo $names[$i];?>">
          <button type="submit" name = "tableName" class = "table-name"><?php
          echo $names[$i];
          ?></button>
        </form><?php
        }
      }
      ?>
    </section>
    </main>
  </body>
</html>
