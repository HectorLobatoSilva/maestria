<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="/radio/img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Radio Station
    </a>
    <?php
        if ( isset( $_SESSION[ 'user' ] ) ) {
    ?>
        <form class="form-inline" method = "POST" action = "/radio/view/newStation.php" >
            <button class="btn btn-success" type="submit"> New station </button>
        </form>
        <form class="form-inline" method = "POST" action = "/radio/controller/logout.php" >
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