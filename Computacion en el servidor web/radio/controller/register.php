<?php

    include_once( 'user.php' );

    $inputUser = $_REQUEST[ 'user' ];
    $inputPassword = $_REQUEST[ 'password' ];
    $inputName = $_REQUEST[ 'name' ];
    $inputLastName = $_REQUEST[ 'lastName' ];

    $user = new User();
    $user->setData( $inputUser, $inputPassword, $inputName, $inputLastName );
    $user->save();

    header( "Location: ../index.php" );

?>