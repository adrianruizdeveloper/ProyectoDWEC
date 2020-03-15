<?php
session_start();
function cabecera($archivo){
    if ($archivo == "index"){

        $registro = "includes/registro_modal.php";
        $index = "index.php";
        $logout = "includes/logout.php";
        $loginjs = "assets/js/login.js";
        $registrojs = "assets/js/registro.js";
        $login = "includes/login.php";
        $admin = "includes/admin.php";
    }else{
        $registro = "registro_modal.php";
        $index = "../index.php";
        $logout = "logout.php";
        $loginjs = "../assets/js/login.js";
        $registrojs = "../assets/js/registro.js";
        $login = "login.php";
        $admin = "admin.php";
    }?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $index;?>">Cine</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
            data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="<?php echo $index;?>" class="nav-link">Inicio</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Proyecciones</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Películas</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Ayuda/Contacto</a></li>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i
                            class="fa fa-cog fa-fw fa-lg"></i></a></li>
                    <?php
                    if(!isset($_SESSION['sess_user_id'])){
                    echo '
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModallogin">Login <span class="caret"></span></button>;
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModalregistro">Register <span class="caret"></span></button>';
                    }else{
                        echo '<li id="n_usuario">' . $_SESSION['sess_user_name'] . '&nbsp &nbsp <a href="'.$logout.'"> <button type="button" class="btn btn-outline-secondary">Logout</button></a></li>&nbsp';
                    if ($_SESSION['rol']==1){
                        echo '<li><a href="'.$admin.'"><button class="btn btn-outline-secondary" type="button">Admin</button></a></li>';
                    }
                    }?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Forgot password</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Reset your password..</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModalregistro">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Registro</h4>
                <button type="button" class="close" data-dismiss="modal"><span style="color: red;">X</span></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <?php include $registro; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModallogin">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal"><span style="color: red;">X</span></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <?php include $login; ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>