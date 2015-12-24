<?php

define('BGALLERY_PATH', dirname(__FILE__) . '/');
error_log("BGALLERY_PATH : ".BGALLERY_PATH);

define('BGALLERY_DIR', basename(dirname(__FILE__)));
error_log("BGALLERY_DIR : ".BGALLERY_DIR);

define('BGALLERY_URL', preg_replace("#^(.*".BGALLERY_DIR."/).*$#i", "\\1", $_SERVER['REQUEST_URI']));
error_log("BGALLERY_URL : ".BGALLERY_URL);


