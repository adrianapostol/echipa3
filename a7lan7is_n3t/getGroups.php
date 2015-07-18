<?php 
require(dirname(__FILE__) . '/index.php');


$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;

$groupModel = new Groups();

header('Content-type: application/json');
echo json_encode($groupModel->getGroup($name, $category, $location));

?>