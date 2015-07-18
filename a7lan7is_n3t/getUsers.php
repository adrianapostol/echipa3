<?php 
require(dirname(__FILE__) . '/index.php');


$name = isset($_REQUEST['group_name']) ? $_REQUEST['group_name'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
$limit = !empty($_REQUEST['limit']) ? $_REQUEST['limit'] : null;

$userModel = new User();

$users = $userModel->getAllUsers($name, $category, $location, $limit);

echo json_encode($users);

?>