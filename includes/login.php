
<li class="px-3 py-2">
    <form class="form" role="form">
        <div class="form-group">
            <input id="username" placeholder="Email" class="form-control form-control-sm" type="text" required="">
        </div>
        <div class="form-group">
            <input id="password" type="password" placeholder="Password" class="form-control form-control-sm" type="text" required="">
        </div>
        <div class="form-group">
            <button id="button-login" type="submit" class="btn btn-primary btn-block" >Login</button>
        </div>
        <div class="form-group text-center">
            <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
         </div>
    </form>
    <span class="text-danger error"></span>
</li>
<script src=<?php echo $loginjs;?>></script>