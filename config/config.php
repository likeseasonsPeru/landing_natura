
<?php
header("Content-type:text/html; charset=utf-8");
define("SLASH", "/");
define("SLASH_SUP", "../");

/*Database Configuration*/
define("HOST", "localhost");
define("DB", "landing_natura");
define("USER", "root");
define("PASS", '');

  $path = array(
      "controllers" => "controllers" . SLASH,
      "css" => "app/css" . SLASH,
      "img" => "app/img" . SLASH,
      "js" => "app/js" . SLASH,
      "module" => "module" . SLASH,
      "layout" => "layout" . SLASH,
      "views" => "views" . SLASH,
      "common" => "common" . SLASH,
  );
 ?>
