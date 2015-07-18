<?php

require(dirname(__FILE__) . '/Atlantis/AtlantisDbModel.php');
require(dirname(__FILE__) . '/Atlantis/models/User.php');
require(dirname(__FILE__) . '/Atlantis/models/Group.php');
require(dirname(__FILE__) . '/Atlantis/models/Interest.php');

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



