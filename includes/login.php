    <form name="login">
    <div class="container">
    <div class="from-groupp">
        <input id="username" placeholder="Usuario" class="form-control form-control-sm" type="text" required>
        <input id="password" type="password" placeholder="Contraseña" class="form-control form-control-sm" type="text" required>
        <div class="form-group">
            <button id="button-login" type="submit" class="btn btn-primary btn-block" >Login</button>
        </div>
    </div>
    </div>
    </form>
    <span class="text-danger error"></span>
<script src=<?php echo $loginjs;?>></script>