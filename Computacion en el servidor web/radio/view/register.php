<div class="container-fluid mt-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="container">
            <form action="controller/register.php" method="post" autocomplete="off" enctype = "multipart/form-data" >
                <div class="form-group row">
                    <label for="registerEmail" class="col-sm-1 col-form-label">email</label>
                    <div class="col-sm-11">
                        <input type="email" class="form-control" id="registerEmail" name = "email" required >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="registerUSerName" class="col-sm-1 col-form-label">User name</label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="registerUSerName" name = "user_name" required >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input type="file"  id="avatar" accept="image/*" name = "avatar">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="registerPassword" class="col-sm-1 col-form-label">Contraseña</label>
                    <div class="col-sm-11">
                        <input type="password" class="form-control" id="registerPassword" pattern = "[A-Za-z0-9]{8,}" title = "Contraseña debe tener por lo menos 8 caracteres" name = "password" required >
                    </div>
                </div>
                <button type="submit" class = "btn btn-primary btn-block" >Registrar</button>
            </form>
        </div>
    </div>
</div>