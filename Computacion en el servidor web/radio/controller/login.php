<?php
    require_once ( 'user.php' );

    $userEmail = $_REQUEST[ 'userName' ];
    $userPassword = $_REQUEST[ 'userPassword' ];

    $user = new User();
    $user->setData( $userEmail, $userPassword );
    $user->login();

    header( "Location: ../index.php" );
?>