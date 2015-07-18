<?php

require(dirname(__FILE__) . '/Atlantis/AtlantisDbModel.php');
require(dirname(__FILE__) . '/Atlantis/models/User.php');

$configuration = array(
    'db' => array (
            'adapter' => "mysqli",
            'host' => "localhost",
            'username' => "root",
            'password' => "",
            'dbname' => "atlantis",
    )
);

$users = new User('db');

echo json_encode($users->getAllUsers());
?>




