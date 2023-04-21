    <?php
    session_start();
    if (isset($_SESSION['pseudo'])) {
    ?>
        <!DOCTYPE html>
        <html dir="ltr" lang="en">



        <body>
            <?php
            include "includes/head.php";
            include('./includes/functions.php');
            $docprofile = new DOMDocument();
            // $docprofile->load('XML/xml1.xml');
            // $xpath = new DOMXPath($docprofile);
            // $prof = $xpath->query("//user[roleId='prof']");
            ?>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
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
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <?php include('./includes/aside-nav.php'); ?>

                <div class="page-wrapper">
                    <div class="page-breadcrumb bg-white" style="border-bottom: 2px solid black !important;">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                                <h4 class="page-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Profile</h4>
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
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="page-breadcrumb ">
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Container fluid  -->
                    <!-- ============================================================== -->
                    <div class="container-fluid">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <!-- Row -->
                        <?php
                        // $doc=new DOMDocument(); $doc->load('../XML/xml1.xml');
                        // $abscences = $doc->getElementsByTagName('users')->item(0);
                        // $xpath = new DOMXPath($doc);
                        // $Prof = $xpath->query("//user[roleId='prof']");
                        // echo $Prof;

                        ?>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-4 col-xlg-3 col-md-12">
                                <div class="white-box">
                                    <div class="user-bg"> <img width="100%" alt="user" src="./img/img1.jpg">
                                        <div class="overlay-box">
                                            <div class="user-content">
                                                <img src="./img/profile.png" class="thumb-lg img-circle" alt="img">
                                                <?php
                                                $docprofile->load('../auth/xml1.xml');
                                                $xpath = new DOMXPath($docprofile);
                                                $pseudo = $_SESSION['pseudo'];
                                                $prof = $xpath->query("//user[pseudo='" . $pseudo . "']");
                                                foreach ($prof as $user) {
                                                    $firstName = $user->getElementsByTagName('first-name')->item(0);
                                                    $lastName = $user->getElementsByTagName('name')->item(0);
                                                    $roleID = $user->getElementsByTagName('roleID')->item(0);
                                                    $password = $user->getElementsByTagName('password')->item(0);
                                                    $phone = $user->getElementsByTagName('phone')->item(0);
                                                }
                                                // unset($docprofile);
                                                // $docprofile->load('XML/xml1.xml');

                                                // $prof=null;
                                                ?>

                                                <h4 class="text-white mt-2"><?php echo $firstName->nodeValue . ' ' . $lastName->nodeValue; ?></h4>
                                                <h5 class="text-white mt-2">
                                                    <?php
                                                    switch ($roleID->nodeValue) {
                                                        case 1:
                                                            echo "Agent de scolarité";
                                                            break;
                                                        case 2:
                                                            echo "Chef département";
                                                            break;
                                                        case 3:
                                                            echo "Chef filière";
                                                            break;
                                                        case 4:
                                                            echo "Professeur";
                                                            break;
                                                        case 5:
                                                            echo "Super Admin";
                                                            break;
                                                    }
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <h1>258</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <h1>125</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <h1>556</h1>
                                </div>
                            </div> -->
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-8 col-xlg-9 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" method="post">
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">First Name</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="firstName" value="<?php echo $firstName->nodeValue ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Last Name</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="text" placeholder="Johnathan Doe" name="lastName" class="form-control p-0 border-0" value="<?php echo $lastName->nodeValue; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Password</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="password" name="password" onfocus="this.type='text';" onblur="this.type='password';" value="<?php echo $password->nodeValue; ?>" class="form-control p-0 border-0">
                                                </div>

                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Phone</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="text" name="phone" placeholder="123 456 7890" class="form-control p-0 border-0" value="<?php echo $phone->nodeValue; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" type="submit" name="updateProfile">Update
                                                        Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php

                                        if (isset($_POST['updateProfile'])) {
                                            $firstName->nodeValue = $_POST['firstName'];
                                            $_SESSION['first-name'] = $_POST['firstName'];
                                            $lastName->nodeValue = $_POST['lastName'];
                                            $_SESSION['name'] = $_POST['lastName'];
                                            $password->nodeValue = $_POST['password'];
                                            $phone->nodeValue = $_POST['phone'];
                                            $docprofile->save("../auth/xml1.xml");
                                            echo '<script>location.href="profile.php"</script>';
                                            // unset($docprofile);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <footer class="footer text-center"> 2023 © ESTS. Gestion des absences LP-ISIR
                    </footer>
                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
            <?php include "includes/jslink2.php"; ?>
        </body>

        </html>
    <?php

    } else {
        header('location: ../logOut.php');
    }




    ?>