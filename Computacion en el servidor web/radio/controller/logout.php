<?php
    require_once ( './../model/user.php' );

    $user = new User();
    $user->logout();

    header( "Location: ../index.php" );
?>