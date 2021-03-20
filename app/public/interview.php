<?php
   if($_POST["key"]) {
      // if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
      //    die ("invalid name and name should be alpha");
      // }
      echo "Key ". $_POST['key']. "<br />";

      exit();
   }
?>
<html>
   <body>
      <form action="<?php $_PHP_SELF ?>" method="POST">
         Key: <input type="text" name="key" />
         <input type="submit" />
      </form>

   </body>
</html>