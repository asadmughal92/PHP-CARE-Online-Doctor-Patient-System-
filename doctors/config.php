<?php

    $mysqli =new mysqli('localhost','root','','care');

    if($mysqli->connect_error)
    {
        die('Cannot connect with database');
    }

    //  echo 'Dataabase Connected';


?>