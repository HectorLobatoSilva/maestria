<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Radio Station</title>
</head>
<body >
    <!-- Image and text -->
    <?php
        if ( isset( $_SESSION[ 'error' ] ) ){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION[ 'error' ]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        }
    ?>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Radio Station
        </a>
        <?php
            if ( isset( $_SESSION[ 'user' ] ) ) {
        ?>
            <form class="form-inline" method = "POST" action = "controller/logout.php" >
                <button class="btn btn-danger my-2 my-sm-0" type="submit"> Logout </button>
            </form>
        <?php } else { ?>
            <form class="form-inline" method = "POST" action = "controller/login.php" >
                <input type="text" placeholder = "email" name="userName" id="userName" class="form-control mr-sm-2" required >
                <input type="password" placeholder = "contraseña" name="userPassword" id="userPassword" class="form-control mr-sm-2" pattern = "[A-Za-z0-9]{8,}" title = "Contraseña debe tener por lo menos 8 caracteres" required >
                <button class="btn btn-success my-2 my-sm-0" type="submit">Login</button>
            </form>
        <?php } ?>
    </nav>
    <div class="wallpaper">
        <?php
            if ( isset( $_SESSION[ 'user' ] ) ) {
        ?>
            <div class="container-fluid text-center">
                <h1> Wellcome <?php echo $_SESSION[ 'user' ]; ?> </h1>
            </div>
        <?php } else { ?>
            <div class="container-fluid mt-5">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="container">
                        <form action="controller/register.php" method="post">
                            <div class="form-group row">
                                <label for="inputUser" class="col-sm-1 col-form-label">User</label>
                                <div class="col-sm-11">
                                    <input type="email" class="form-control" id="inputUser" name = "user" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-1 col-form-label">Name</label>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" id="inputName" name = "name" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLastName" class="col-sm-1 col-form-label">Last Name</label>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" id="inputLastName" name = "lastName" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-1 col-form-label">Contraseña</label>
                                <div class="col-sm-11">
                                    <input type="password" class="form-control" id="inputPassword" pattern = "[A-Za-z0-9]{8,}" title = "Contraseña debe tener por lo menos 8 caracteres" name = "password" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPasswordRepeat" class="col-sm-1 col-form-label">Repetir contraseña</label>
                                <div class="col-sm-11">
                                    <input type="password" class="form-control" id="inputPasswordRepeat">
                                </div>
                            </div>
                            <button type="submit" class = "btn btn-primary btn-block" >Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src = "../js/register.js"></script>
</body>
</html>