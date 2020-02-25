<?php
    session_start();
    class Station {

        private $nombre;
        private $logo;
        private $ciudad_origen;
        private $frecuencia_am;
        private $frecuencia_fm;
        private $tipo;
        private $comentario;

        public function init($nombre, $logo, $ciudad_origen, $frecuencia_am, $frecuencia_fm, $tipo, $comentario)
        {
            $this->nombre = $nombre;
            $this->logo = $logo;
            $this->ciudad_origen = $ciudad_origen;
            $this->frecuencia_am = $frecuencia_am;
            $this->frecuencia_fm = $frecuencia_fm;
            $this->tipo = $tipo;
            $this->comentario = $comentario;
        }

        // show all records
        public function index()
        {
            require_once( 'conection.php' );
            $results = $database->query("SELECT * FROM estacions");
            $database->close();
            return $results;
        }

        // show specific record
        public function show($id)
        {
            require_once( 'conection.php' );
            $results = $database->query("SELECT * FROM estacions WHERE id = $id");
            $database->close();
            return $results;
        }

        // save a new record
        public function save()
        {
            require_once( 'conection.php' );
            $values = "'".$this->nombre."','".$this->logo."','".$this->ciudad_origen."','".$this->frecuencia_am."','".$this->frecuencia_fm."','".$this->tipo."','".$this->comentario."','".$_SESSION['user']['email']."'";
            $database->query("INSERT INTO estacions( nombre, logo, ciudad_origen, frecuencia_am, frecuencia_fm, tipo, comentario, usuario_email ) VALUES( $values )");
            $database->close();
        }

        // update a record
        public function update($id)
        {
            require_once( 'conection.php' );
            $query = "UPDATE estacions SET nombre = '".$this->nombre."', logo = '".$this->logo."', ciudad_origen = '".$this->ciudad_origen."', frecuencia_am = '".$this->frecuencia_am."', frecuencia_fm = '".$this->frecuencia_fm."', tipo = '".$this->tipo."', comentario = '".$this->comentario."' WHERE id = ".$id;
            $results = $database->query( $query );
            $database->close();
            return $results;
        }

        // delete a record
        public function delete($id)
        {
            require_once( 'conection.php' );
            if ( $database->query("DELETE FROM estacions WHERE id = $id") === TRUE ){
                return true;
            }
            $database->close();
        }

    }
?>