<?php
    session_start();
    
    class User {
        private $email = '';
        private $password = '';
        private $user_name = '';
        private $avatar;

        function init( $email, $password = '', $user_name = '', $avatar = '' ) {
            $this->email = $email;
            $this->password = $password;
            $this->user_name = $user_name;
            $this->avatar = $avatar;
        }

        public function index()
        {
            require_once('conection.php');
            return $database->query("SELECT * FROM users");
        }

        // show session user data
        public function current_user()
        {
            require_once('conection.php');
            return $database->query("SELECT * FROM users WHERE email = ".$_SESSION['user']['email']);
        }

        public function save()
        {
            require_once('conection.php');
            $data = "'".$this->email."','".$this->user_name."','".$this->avatar."','".sha1($this->password)."'";
            $query = "INSERT INTO users( email, user_name, avatar , password ) VALUES( $data )";
            if ( $database->query( $query ) === TRUE ) {
                $_SESSION['user'] = array('email'=>$this->email,'user_name'=>$this->user_name,'avatar'=>$this->avatar);
            } else {
                echo $database->error;
            }
            $database->close();
        }

        public function update()
        {
            require_once('conection.php');
            $user = $database->query("UPDATE users SET email =  " .$this->email.", user_name = ".$this->user_name.", avatar =  ".$this->avatar.", password =  ".sha1($this->password)." WHERE email = ". $_SESSION['user']['email'] );
            if ( $user ) {
                $_SESSION['user'] = $user;
                return $user;
            }
        }

        public function destroy()
        {
            require_once('conection.php');
            return $database->query("DELETE FROM users WHERE email = ". $_SESSION['user']['email']);
            $database->close();
        }

        public function login()
        {
            require_once('conection.php');
            $data = "email = '".$this->email."' AND password = '".sha1($this->password)."'";
            $result = $database->query("SELECT * FROM users WHERE $data");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['user'] = array('email'=>$row['email'],'user_name'=>$row['user_name'],'avatar'=>$row['avatar']);
            } else {
                echo "0 results";
            }
            $database->close();
        }

        public function logout()
        {
            session_destroy();
        }


        // function createSession( $name ){
        //     $_SESSION[ 'user' ] = $name;
        // }

        // function destroySession(){
        //     session_destroy();
        // }

        // function createErrorSession( $error ){
        //     $_SESSION[ 'error' ] = $error;
        // }

        // function login () {
        //     $jsonObj = file_get_contents( '../data/users.json' );
        //     $array = json_decode( $jsonObj, true );

        //     if ( array_key_exists( $this->email, $array ) ) {
        //         if ( $array[ $this->email ][ 'password' ] === sha1( $this->password ) ){
        //             unset( $_SESSION[ 'error' ] );
        //             $this->createSession( $array[ $this->email ][ 'name' ] );
        //         } else {
        //             $this->createErrorSession( 'Usuario o contraseña incorrectos' );
        //         }
        //     } else {
        //         $this->createErrorSession( 'Usuario o contraseña incorrectos' );
        //     }
        // }

        // function save(){
        //     $jsonObj = file_get_contents( '../data/users.json' );
        //     $array = json_decode( $jsonObj, true );

        //     $array[ $this->email ] = array (
        //         'password' => sha1( $this->password ),
        //         'name' => $this->name,
        //         'lastName' => $this->lastName
        //     );

        //     file_put_contents( '../data/users.json', json_encode( $array ));

        //     $this->createSession( $this->name );
        // }
    }
?>