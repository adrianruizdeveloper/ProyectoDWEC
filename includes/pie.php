<?php
    function footer($archivo){
        if ($archivo == "index"){
        $contacto="includes/contacto.php";
        $contactojs="assets/js/contacto.js";
        }else{
            $contacto="contacto.php";
            $contactojs="../assets/js/contacto.js";
        }?>
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Colaboradores</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Adrián Ruiz Martínez</a>
                        </li>
                        <li>
                            <a href="#!">Ernesto Castillo Martínez</a>
                        </li>
                        <li>
                            <a href="#!">Ivan Ojeda Roig</a>
                        </li>
                        <li>
                            <a href="#!">Francisco Javier Muñoz Montoro</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Contacto</h5>

                    <ul class="list-unstyled ">
                        <li>
                            <a href="#!">Github</a>
                        </li>
                        <li>
                            <a href="#!" data-toggle="modal" data-target="#myModalcontacto">Contacto</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

    </footer>

    <div class="modal" id="myModalcontacto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Contacto</h4>
                <button type="button" class="close" data-dismiss="modal"><span style="color: red;">X</span></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <?php include $contacto; ?>
            </div>
        </div>
    </div>
</div>
    <?php } ?>