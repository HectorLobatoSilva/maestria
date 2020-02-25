<?php
    require_once ( './../model/user.php' );

    $userEmail = $_POST[ 'userName' ];
    $userPassword = $_POST[ 'userPassword' ];

    $user = new User();
    $user->init( $userEmail, $userPassword );
    $user->login();

    header( "Location: ../index.php" );
?>