<?php
require(dirname(__FILE__) . '/index.php');


$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 'getCategories';
$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : null;


$groupModel = new Groups();

$result = array();
if (method_exists($groupModel, $type)) {
    $result = $groupModel->{$type}($limit);
}


echo json_encode($result);

