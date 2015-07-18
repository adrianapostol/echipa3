<?php
require(dirname(__FILE__) . '/index.php');


$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;
$location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
$url = isset($_REQUEST['url']) ? $_REQUEST['url'] : null;

if (empty($name) || empty($category) || empty($location) || empty($url)){
    echo json_encode(array('error' => 'missing arguments'));
    exit;
}

$groupModel = new Groups();

echo json_encode($groupModel->createGroup($name, $category, $location, $url));

