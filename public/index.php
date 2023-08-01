<?php
use MVC\core\app;
define("DS",DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__));
define("APP",ROOT.DS."app");
define("VENDOR",ROOT.DS."vendor");
define("CORE",APP.DS."core");
define("CONTROLLERS",APP.DS."controllers");
define("MODELS",APP.DS."models");
define("VIEWS",APP.DS."views");

require_once (VENDOR.DS."autoload.php");

$obj = new app;