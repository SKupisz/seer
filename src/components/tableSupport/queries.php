<section class = "queries">
  <form method="post" action = "./src/logic/doTheQuery.php?tbn=<?php echo $_GET['tbn'];?>">
  <textarea name = "query" class = "query-content" required placeholder="Your query here..."></textarea>
  <button class = "queries-submitBtn" type="submit">
    Submit query
  </button>
</form>
</section>
