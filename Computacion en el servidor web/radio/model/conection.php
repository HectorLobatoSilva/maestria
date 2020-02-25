<?php
    $database = new mysqli("localhost","Hector","benas99","radio");
    if ( $database->connect_errno ) {
        echo "No se conecto";
    }
?>