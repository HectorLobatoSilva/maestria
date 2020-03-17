<?php
    session_start();
    if ( isset($_SESSION['user']) ) {
        require_once ( './../model/station.php' );
        $id = $_GET['id'];
        $estacion = new Station();
        $results = $estacion->show( $id );
        $valores = array(
            'nombre'=> '',
            'logo' => '',
            'tipo' => '',
            'ciudad_origen' => '',
            'frecuencia_am' => '',
            'frecuencia_fm' => '',
            'tipo' => '',
            'comentario' => ''
        );
        if ( $results->num_rows > 0 ) {
            $row = $results->fetch_assoc();
            $valores = array(
                'nombre' => $row['nombre'],
                'logo' => $row['logo'],
                'tipo' => $row['tipo'],
                'ciudad_origen' => $row['ciudad_origen'],
                'frecuencia_am' => $row['frecuencia_am'],
                'frecuencia_fm' => $row['frecuencia_fm'],
                'tipo' => $row['tipo'],
                'comentario' => $row['comentario']
            );
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostar estacion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php require_once('navBar.php'); $image = '<img class="card-img" src="data:image/png;base64,'.base64_encode( $row['logo'] ).'"/>';?>
    <div class="container">
    <p>&nbsp;</p>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <?php echo $image ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nombre']." de ".$row['ciudad_origen'] ?></h5>
                    <p class="card-text"> <?php echo $row['frecuencia_am']." am y ".$row['frecuencia_fm'] ?> fm </p>
                    <p class="card-text"><small class="text-muted"> <?php echo $row['tipo']." <br/> ".$row['comentario'] ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php } ?>