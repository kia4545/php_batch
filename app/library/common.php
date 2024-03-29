<?php
declare(strict_types=1);

define("HOME_DIR", dirname(__DIR__) . '/');
define("HTDOCS_DIR", HOME_DIR . "htdocs/");
define("CONFIG_DIR", HOME_DIR . "config/");
define("LIBRARY_DIR", HOME_DIR . "library/");
define("TEMPLATE_DIR", HOME_DIR . "template/");

require_once(CONFIG_DIR . "config.php");
require_once(LIBRARY_DIR . "validate.php");
require_once(LIBRARY_DIR . "database.php");
require_once(LIBRARY_DIR . "users.php");
