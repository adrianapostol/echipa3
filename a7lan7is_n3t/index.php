<?php

require(dirname(__FILE__) . '/Atlantis/AtlantisDbModel.php');
require(dirname(__FILE__) . '/Atlantis/models/User.php');
require(dirname(__FILE__) . '/Atlantis/models/Group.php');

header("Access-Control-Allow-Origin: http://localhost:8000");
header('Content-type: application/json');


$configuration = array(
    'db' => array (
            'adapter' => "mysqli",
            'host' => "localhost",
            'username' => "root",
            'password' => "",
            'dbname' => "atlantis",
    )
);


?>



