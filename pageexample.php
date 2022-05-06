<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>
  	<div id="page-wrap">
    <?php
      session_start();
      include('contentdisplayer.php');
      $categ = "home"; //METTRE LE NOM DE LA PAGE OU PARTIE
      $obj = new simpleCMS();
      $obj->connect();

      if (isset($_POST["add"]))
      {$obj->write($_POST, $categ);}
      if (isset($_POST["update"])) 
      {$obj->update($_POST, $_POST["contentid"]);}
      
      if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 1) {
        echo $obj->display_admin($categ);
      } 
      else {
        echo $obj->display_public($categ);
      }
    ?>
	</div>
  </body>

</html>