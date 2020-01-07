<?php
    session_start();
    class User {
        private $email = '';
        private $password = '';
        private $name = '';   
        private $lastName = '';
        
        function setData( $email, $password, $name = '', $lastName = '' ) {
            $this->email = $email;
            $this->password = $password;
            $this->name = $name;
            $this->lastName = $lastName;            
        }

        function createSession( $name ){
            $_SESSION[ 'user' ] = $name;
        }

        function destroySession(){
            session_destroy();
        }

        function createErrorSession( $error ){
            $_SESSION[ 'error' ] = $error;
        }

        function login () {
            $jsonObj = file_get_contents( '../data/users.json' );
            $array = json_decode( $jsonObj, true );

            if ( array_key_exists( $this->email, $array ) ) {
                if ( $array[ $this->email ][ 'password' ] === sha1( $this->password ) ){
                    unset( $_SESSION[ 'error' ] );
                    $this->createSession( $array[ $this->email ][ 'name' ] );
                } else {
                    $this->createErrorSession( 'Usuario o contraseña incorrectos' );
                }
            } else {
                $this->createErrorSession( 'Usuario o contraseña incorrectos' );
            }
        }

        function save(){
            $jsonObj = file_get_contents( '../data/users.json' );
            $array = json_decode( $jsonObj, true );

            $array[ $this->email ] = array (
                'password' => sha1( $this->password ),
                'name' => $this->name,
                'lastName' => $this->lastName
            );

            file_put_contents( '../data/users.json', json_encode( $array ));

            $this->createSession( $this->name );
        }
    }
?>