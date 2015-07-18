<?php 
require(dirname(__FILE__) . '/index.php');


$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
$nickname = isset($_REQUEST['skypeid']) ? $_REQUEST['skypeid'] : null;

$groupModel = new Groups();

$groups = $groupModel->getGroup($name, $category, $location);
$name = strtolower($name);

if (!empty($nickname) && !empty($name) && isset($groups[$name])) {
    //user join group
    $userModel = new User();
    $userModel->joinGroup($name, $groups[$name]['group_name']);
}

echo json_encode($groups);

?>