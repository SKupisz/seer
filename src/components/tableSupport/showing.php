<section class = "structure">
  <header class = "structure-header">
    <?php echo $name; ?> structure
  </header>
    <main class = "structure-content">
      <div class = "column-row">
        <div class = "column-name">
          Name
        </div>
        <div class = "column-type">
          Type
        </div>
        <div class = "column-null">
          Is null?
        </div>
        <div class = "column-primary">
          Primary key
        </div>
        <div class = "column-default">
          Default
        </div>
        <div class = "column-extra">
          Extra
        </div>
        </div>
      <?php
        for($i = 0 ; $i < $howMany; $i++)
        {
          $toShow = $titles[$i];
          if(strlen($toShow) > 10)
          {
            $toShow = substr($toShow,0,6)."...";
          }
          ?><div class = "column-row">
            <div class = "column-name">
              <span class = "table-elextended">
                <?php echo $titles[$i];?>
              </span>
              <span class = "table-elnormal">
                <?php echo $toShow;?>
              </span>
            </div>
            <div class = "column-type">
              <?php echo $types[$i];?>
            </div>
            <div class = "column-null">
              <?php echo $null[$i];?>
            </div>
            <div class = "column-primary">
              <?php echo $pri[$i];?>
            </div>
            <div class = "column-default">
              <?php echo $default[$i];?>
            </div>
            <div class = "column-extra">
              <?php echo $extra[$i];?>
            </div>
            </div><?php
        }?>
    </main>
</section>
