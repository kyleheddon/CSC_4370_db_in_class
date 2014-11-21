<?php
  include 'createTables.php';
  $tableCreator = new TableCreator();
  $tableCreator->create_tables();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container">
            <form>
                <p class="label">Username</p>
                <input type="text" name="username">
                <p class="label">Password</p>
                <input type="password" name="password">
            </form>
        </div>

        <?php
        ?>
    </body>
</html>
