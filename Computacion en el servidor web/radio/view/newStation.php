<?php 
    session_start();
    $valores = array(
        'nombre'=> '',
        'ciudad_origen' => '',
        'frecuencia_am' => '',
        'frecuencia_fm' => '',
        'tipo' => '',
        'comentario' => ''
    );
    $id = '';
    if ( isset( $_POST['id'] ) ){
        $id = $_POST['id'];
        if ( !empty( $id ) ) {
        
            require_once ( './../model/station.php' );
            $estacion = new Station();
            $results = $estacion->show( $id );
            
            if ( $results->num_rows > 0 ) {
                $row = $results->fetch_assoc();
                $valores = array(
                    'nombre' => $row['nombre'],
                    'ciudad_origen' => $row['ciudad_origen'],
                    'frecuencia_am' => $row['frecuencia_am'],
                    'frecuencia_fm' => $row['frecuencia_fm'],
                    'tipo' => $row['tipo'],
                    'comentario' => $row['comentario']
                );
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Station</title>
    <link rel="icon" href="/radio/img/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once('./navBar.php');
        echo <<< container
            <div class="container-fluid mt-5">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="container">
        container;
        if ( empty( $id ) ) {
            echo <<< container
                            <form action="/radio/controller/registerStation.php" method="post" autocomplete="off" enctype = "multipart/form-data" >
            container;
        } else {
            echo <<< container
                            <form action="/radio/controller/updateStation.php" method="post" autocomplete="off" enctype = "multipart/form-data" >
            container;
        }
        echo <<< container
                            <div class="form-group row">
                                <input type = "text" value = {$id} name = "id" hidden />
                            </div>
                            <div class="form-group row">
                                <label for="registerNombre" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="registerNombre" name = "nombre" required value = "{$valores['nombre']}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="registerLogo" class="col-form-label">Logo</label>
                                    <div class="custom-file">
                                        <input type="file"  id="registerLogo" accept="image/*" name = "logo">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="registerCiudadOrigen" class="col-sm-2 col-form-label">Ciudad origen</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="registerCiudadOrigen" name = "ciudad_origen" required value = {$valores['ciudad_origen'] } >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="registerFrecuenciaAm" class="col-sm-2 col-form-label">Frecuencia AM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="registerFrecuenciaAm" name = "frecuencia_am" required value = {$valores['frecuencia_am'] } >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="registerFrecuenciaFm" class="col-sm-2 col-form-label">Frecuencia FM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="registerFrecuenciaFm" name = "frecuencia_fm" required value = {$valores['frecuencia_fm'] } >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="registerTipo" class="col-sm-2 col-form-label">Tipo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="registerTipo" name = "tipo" required value = {$valores['tipo'] } >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="registerComentario" class="col-sm-2 col-form-label">Comentario</label>
                                <div class="col-sm-10">
                                    <Textarea row = "3" class="form-control" id="registerComentario" name = "comentario" required > {$valores['comentario']} </Textarea>
                                </div>
                            </div>
            container;
            if ( empty( $id ) ) {
                echo <<< container
                                <button type="submit" class = "btn btn-primary btn-block" >Registrar Estación</button>
                container;
            } else {
                echo <<< container
                                <button type="submit" class = "btn btn-primary btn-block" >Actualizar Estación</button>
                container;
            }
            echo <<< container
                        </form>
                    </div>
                </div>
            </div>
        container;
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>