<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MinRap</title>
    <link rel="stylesheet" href = "./src/css/connect.css"/>
  </head>
  <body>
    <section class = "form-wrapper">
      <header class = "main-header">
        Connect to your database
      </header>
    <form method="post" action="src/logic/connect.php">
      <input type="text" class = "connect-input" name = "hst" placeholder="Host..." required/>
      <input type="text" class = "connect-input" name = "user" placeholder="User..." required/>
      <input type="password" class = "connect-input" name = "pass" placeholder="Password..."/>
      <input type="text" class = "connect-input" name = "dbname" placeholder="Database name..." required/>
      <button type="submit" class = "submit-button">
        Connect
      </button>
    </form>
  </section>
  </body>
</html>
