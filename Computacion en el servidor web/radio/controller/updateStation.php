<?php
    session_start();
    require_once ( './../model/station.php' );
    if ( isset($_SESSION['user']) ) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $logo = addslashes( file_get_contents( $_FILES[ 'logo' ] [ 'tmp_name' ] ) );
        $ciudad_origen = $_POST['ciudad_origen'];
        $frecuencia_am = $_POST['frecuencia_am'];
        $frecuencia_fm = $_POST['frecuencia_fm'];
        $tipo = $_POST['tipo'];
        $comentario = $_POST['comentario'];

        $estacion = new Station();
        $estacion->init( $nombre, $logo, $ciudad_origen, $frecuencia_am, $frecuencia_fm, $tipo, $comentario );
        $estacion->update($id);

        header( "Location: ../index.php" );
    }else {
        echo "no hay";
    }
?>