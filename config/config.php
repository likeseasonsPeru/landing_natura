
<?php
header("Content-type:text/html; charset=utf-8");
define("SLASH", "/");
define("SLASH_SUP", "../");

/*Database Configuration*/
define("HOST", "likeseasons.com");
define("DB", "eigbitco_natura");
define("USER", "eigbitco_natura");
define("PASS", 'M@:v3r!cK');

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
