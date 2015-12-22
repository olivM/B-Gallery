<?php
require_once('../PHPThumb/PHPThumb.php');
require_once('../PHPThumb/GD.php');

// get the thumbnail from the URL
$src = strip_tags(htmlspecialchars($_GET['thumb']));

error_log('thumb : '.$src);

@mkdir(dirname($src), 0777, true);

$thumb = new PHPThumb\GD('../'.$src);
$thumb->adaptiveResize(175, 175);
$thumb->save($src);
$thumb->show();
