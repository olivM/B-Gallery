<?php

define('BGALLERY_PATH', dirname(__FILE__) . '/');
define('BGALLERY_DIR', basename(dirname(__FILE__)));
define('BGALLERY_URL', preg_replace("#^(.*".BGALLERY_DIR."/).*$#", "\\1", $_SERVER['REQUEST_URI']));
