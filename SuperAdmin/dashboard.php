<?php
session_start();
if (isset($_SESSION['pseudo'])) {
    include "includes/head.php";
    include('./includes/functions.php');
?>


    <body>
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
            <?php include('./includes/aside-nav.php'); ?>
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <div class="page-breadcrumb bg-white" style="border-bottom: 2px solid black !important;">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                            <h4 class="page-title"><i class="fab fa-wpforms fa-card"></i>&nbsp;&nbsp;Les filières et Total d'absence :</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <div class="d-md-flex">
                                <ol class="breadcrumb ms-auto">
                                    <li><a href="./dashboard.php" class="fw-normal">Dashboard</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row stats-row hbb">
                    <?php
                    //statistics circles
                    filiere_absence();
                    ?>
                </div>
                <footer class="footer text-center"> 2023 © ESTS. Gestion des absences LP-ISIR
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->

        </div>

        <style>
            footer {
                position: fixed;
                bottom: 0;
                margin: 0;
                margin-left: 30%;


            }

            .scl {
                transition: .7s;
                margin-bottom: 50px !important;
            }

            .scl:hover {
                cursor: pointer;
                transform: scale(1.16);
                transition: .5s;
            }

            .hbb {
                margin-top: 8% !important;

            }

            .page-wrapper {

                height: fit-content;
            }
        </style>
        <?php include "includes/jslink2.php"; ?>
    </body>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <style>
        .page-wrapper {
            background-color: white !important;
        }
    </style>

    </html>
<?php

} else {
    header('location: ../logOut.php');
}




?>