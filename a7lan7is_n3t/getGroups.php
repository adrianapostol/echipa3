<?php 
require(dirname(__FILE__) . '/index.php');


$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
$groupModel = new Groups();

header('Content-type: application/json');
echo json_encode($groupModel->getGroup($name));

?>