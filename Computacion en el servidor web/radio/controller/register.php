<?php

    require_once ( './../model/user.php' );

    $email = $_POST[ 'email' ];
    $user_name = $_POST[ 'user_name' ];
    $avatar = addslashes( file_get_contents( $_FILES[ 'avatar' ] [ 'tmp_name' ] ) );
    $password = $_POST[ 'password' ];

    $user = new User();
    $user->init( $email, $password, $user_name, $avatar );
    $user->save();

    header( "Location: ../index.php" );

?>