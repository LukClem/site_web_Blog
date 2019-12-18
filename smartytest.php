<?php
require_once 'config/init.conf.php'; 
require_once('vendor/smarty/Smarty.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

$smarty->assign('name','Lucas98');

//** un-comment the following line to show the debug console
$smarty->debugging = true;

$smarty->display('smarty-test.tpl');

?>