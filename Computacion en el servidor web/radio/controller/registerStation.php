<?php
    require_once ( './../model/station.php' );

    $nombre = $_POST['nombre'];
    $logo = addslashes( file_get_contents( $_FILES[ 'logo' ] [ 'tmp_name' ] ) );
    $ciudad_origen = $_POST['ciudad_origen'];
    $frecuencia_am = $_POST['frecuencia_am'];
    $frecuencia_fm = $_POST['frecuencia_fm'];
    $tipo = $_POST['tipo'];
    $comentario = $_POST['comentario'];

    $estacion = new Station();
    $estacion->init( $nombre, $logo, $ciudad_origen, $frecuencia_am, $frecuencia_fm, $tipo, $comentario );
    $estacion->save();

    header( "Location: ../index.php" );
?>