<?php
    require_once ( './../model/station.php' );
    if ( isset($_SESSION['user']) ){
        $id = $_POST['id'];
        $estacion = new Station();
        $estacion->delete($id);

        header( "Location: ../index.php" );
    }
?>