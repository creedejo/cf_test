<?php

//db connection info
require_once('app/config/config.php');

require_once('app/classes/page.php');
$page = new Page();

//template generates table with user data
$page->template='templates/user_table.php';

$page->renderPage();

?>