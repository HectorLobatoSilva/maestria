<?php
    require_once ( 'user.php' );

    $user = new User();
    $user->destroySession();

    header( "Location: ../index.php" );
?>