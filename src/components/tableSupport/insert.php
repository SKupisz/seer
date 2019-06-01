<section class = "insert">
  <header class = "insert-header">
    Insert
  </header>
  <form method="post" action = "./src/logic/insert.php">
    <?php
    for($i = 0 ; $i < $howMany; $i++)
    {
      $now  = $titles[$i];
      ?>
      <div class = "insert-inputWrapper">
        <div class = "insert-inputDesc">
          <?php echo $now;?>
        </div>
        <input type = "<?php
        echo $typesTranslation[$types[$i]];?>" class = "insert-inputContent" name = "<?php echo $now;?>"/>
      </div>
      <?php
    }
    ?>
    <input type = "hidden" name = "tableName" value = "<?php echo $name;?>"/>
    <button class = "insert-submit" type="submit">
      Insert
    </button>
  </form>
</section>
