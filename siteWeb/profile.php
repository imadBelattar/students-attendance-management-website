<?php 
    session_start();
     if(isset($_SESSION['pseudo'])){
        ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Porfesseur</title>
    <link rel="icon" type="image/png"
        href="http://ecampus-ests.uca.ma/pluginfile.php/1/theme_moove/logo/1606691469/imageonline-co-transparentimage.png">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <?php
    
    $docprofile = new DOMDocument();
    $roleID=$_SESSION['roleID'];
    switch( $roleID){
        case 1:$URL="agentS.php";break;
        case 2:$URL="dashboard.php";break;
        case 3:$URL=" ";break;
        case 4:{$URL="dashboard.php" ;break;}
        case 5:$URL="../SuperAdmin/dashboard.php";break;
    }
   
    ?>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include "../includes/header.php";?>

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href=<?php echo $URL;?>
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu" id="Dashboard">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <?php
                        if($roleID ==2){
                          echo' <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Dept.php"
                            aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="hide-menu" id="Profile">Departement</span>
                        </a>
                    </li>';}
                        ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                <!-- onclick="onLoad()" -->
                                <select name="listlanguages" onchange="langSelectChange(this)">
                                    <option value="en" id="en">en</option>
                                    <option value="de" id="de">de</option>
                                </select>
                            </a>

                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
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
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="../SuperAdmin/img/profile.png"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <?php
                                        $docprofile->load('../auth/xml1.xml');
                                        $xpath = new DOMXPath($docprofile);
                                        $pseudo=$_SESSION['pseudo'];
                                        $prof = $xpath->query("//user[pseudo='".$pseudo."']");
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

                                        <h4 class="text-white mt-2"><?php echo $firstName->nodeValue; ?></h4>
                                        <h5 class="text-white mt-2">
                                            <?php
                                            switch($roleID->nodeValue){
                                                case 1: echo "Agent de scolarité";break;
                                                case 2: echo "Chef département";break;
                                                case 3: echo "Chef filière";break;
                                                case 4: echo "Professeur";break;
                                                case 5: echo "Super Admin";break;
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
                                            <input type="text" placeholder="Johnathan Doe"
                                                class="form-control p-0 border-0" name="firstName"
                                                value="<?php echo $firstName->nodeValue ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Last Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Johnathan Doe" name="lastName"
                                                class="form-control p-0 border-0"
                                                value="<?php echo $lastName->nodeValue; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" name="password"
                                                value="<?php echo $password->nodeValue; ?>"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Phone</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="phone" placeholder="123 456 7890"
                                                class="form-control p-0 border-0"
                                                value="<?php echo $phone->nodeValue; ?>">
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
                                    $lastName->nodeValue = $_POST['lastName'];
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
            <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>
<?php
  
} else{
  header('location: ../logOut.php');
}
 
 
 
 
 ?>