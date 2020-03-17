<?php
    require_once ( './model/station.php' );
?>
<div class="container-fluid text-center">
    <h1> Wellcome <?php $user_name = $_SESSION[ 'user' ]['user_name']; echo $user_name; ?> </h1>
    <ul class="list-group">
        <?php
            // $estaciones = new Station();
            // $resuts = $estaciones->index();
            // if ( $resuts->num_rows > 0 ) {
            //     while( $row = $resuts->fetch_assoc() ) {
            //         echo <<<lista
            //             <div class="d-flex bd-highlight mb-3 list-group-item">
            //                 <div class="mr-auto p-2 bd-highlight"><a href = "/radio/view/showStation.php?id={$row['id']}"> {$row['nombre']} </a></div>
            //         lista;
            //         if ( $row['usuario_email'] === $_SESSION['user']['email'] ) {
            //             echo <<<lista
                            // <form class = "p-2 bd-highlight" method = "POST" action = "/radio/view/newStation.php" >
                            //     <input hidden name = "id" value = "{$row['id']}"/>
                            //     <button class="btn btn-primary p-2 bd-highlight">Editar</button>
                            // </form>
                            // <form class = "p-2 bd-highlight" method = "POST" action = "/radio/controller/deleteStation.php" >
                            //     <input hidden name = "id" value = {$row['id']} />
                            //     <button class="btn btn-danger p-2 bd-highlight">Eliminar</button>
                            // </form>
            //             lista;
            //         }
            //         echo <<<lista
            //             </div>
            //         lista;
            //     }
            // }

            $estaciones = new Station();
            $results = $estaciones->index();
            if ( $results->num_rows > 0 ) {
                while ( $row = $results->fetch_assoc() ){
            ?>
                    <div class="d-flex bd-highlight mb-3 list-group-item">
                        <div class = "mr-auto p-2 bd-highlight"> <a href= <?php echo "/radio/view/showStation.php?id=".$row['id'] ?>> <?php echo $row['nombre'] ?> </a> </div>
                        <?php 
                            if ( $row['usuario_email'] === $_SESSION['user']['email'] ) {
                        ?>
                            <form class = "p-2 bd-highlight" method = "POST" action = "/radio/view/newStation.php" >
                                <input hidden name = "id" value = <?php echo $row['id'] ?> />
                                <button class="btn btn-primary p-2 bd-highlight">Editar</button>
                            </form>
                            <form class = "p-2 bd-highlight" method = "POST" action = "/radio/controller/deleteStation.php" >
                                <input hidden name = "id" value = <?php echo $row['id'] ?> />
                                <button class="btn btn-danger p-2 bd-highlight">Eliminar</button>
                            </form>
                        <?php
                            }
                        ?>
                    </div>
            <?php
                }
            }
        ?>
    </ul>
</div>