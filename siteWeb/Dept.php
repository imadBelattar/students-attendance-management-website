<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
         session_start();
         ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5
            dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5
            dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Dashboard du super Administrateut</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="myCSS/calender.css" rel="stylesheet">
    <!--multi languages script  -->

    <!--JS and Style for the dataTable  -->
    <!-- <script src="myJS/JS/js1.js"></script>
    <script src="myJS/JS/js2.js"></script>
    <script src="myJS/JS/js3.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"> -->

</head>

<body>
    <?php
    include "../includes/header.php";
    ?>
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                            aria-expanded="false">
                            <i class="far fa-clock" aria-hidden="true"></i>
                            <span class="hide-menu" id="Dashboard1">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                            aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="hide-menu" id="Profile">Profile</span>
                        </a>
                    </li>
                    <?php
                        $roleID=$_SESSION['roleID'] ;
                        if($roleID==2){
                            echo' <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Dept.php"
                            aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="hide-menu" id="Profile">Departement</span>
                        </a>
                    </li>';
                        }
                    ?>


                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                            <select name="listlanguages" id="language-select">
                                <option value="en" id="en">English</option>
                                <option value="fr" id="fr">Francais</option>
                                <option value="ar" id="ar">العربية</option>
                            </select>
                        </a>

                    </li>


                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <?php

        $id_user=$_SESSION['id_user'];        
        $doc = new DOMDocument();
        $doc->load('../auth/xml1.xml');
        $root = $doc->documentElement;
        $departements=$root->getElementsByTagName('departments')[0];
        $department=$departements->getElementsByTagName('department');
                 //echo "<tr><td>taha</td></tr>"; 
                foreach ($department as $dept) {
                       // echo "<tr><td>taha</td></tr>";            
                    if ($id_user == $dept->getElementsByTagName('chefd')[0]->nodeValue) {
                        $_SESSION['nomdept']= $dept->getElementsByTagName('name')[0]->nodeValue;
                        $_SESSION['iddept']= $dept->getAttribute('id');                
                    }
                }    
                //$_SESSION['nomdept']="GI";
                    $departement_name= $_SESSION['nomdept']; 
         ?>
    <div class="page-wrapper">
        <center>
            <h1 class="tracking-in-expand">Departement</h1>
        </center>
        <div class="grid">
            <div><img src="img/materiel-informatique.png" alt="">
                <center>
                    <h3><a href="FilDept.php"><?php echo $departement_name ; ?></a></h3>
                </center>
            </div>
            <!--<div><img src="img/materiel-informatique.png" alt=""></div>
  <div><img src="img/materiel-informatique.png" alt=""></div>
  <div><img src="img/materiel-informatique.png" alt=""></div>-->
        </div>


        <style>
        /* .grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 5rem;
  padding: 10px;

}*/
        .grid {
            display: flex;
            overflow: auto;
            margin-top: 70px;
            background-color: white;
            margin-left: 2%;

        }

        .grid div {
            border-radius: 5px;
            border: 1px black solid;
            margin: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
            background-color: beige;
        }

        .grid img {
            padding: 10px;
            margin: 10px;
            border-radius: 50%;
            width: 220px;
            height: 200px;
            border-bottom: 1px black solid;
        }

        .page-wrapper {
            background-color: white;
        }

        /*center h1 {
    margin-top: 10px;
    border-bottom: 3px black solid;
}*/
        /* ----------------------------------------------
 * Generated by Animista on 2023-1-15 14:19:15
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

        /**
 * ----------------------------------------
 * animation tracking-in-expand
 * ----------------------------------------
 */
        @-webkit-keyframes tracking-in-expand {
            0% {
                letter-spacing: -0.5em;
                opacity: 0;
            }

            40% {
                opacity: 0.6;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes tracking-in-expand {
            0% {
                letter-spacing: -0.5em;
                opacity: 0;
            }

            40% {
                opacity: 0.6;
            }

            100% {
                opacity: 1;
            }
        }

        .tracking-in-expand {
            -webkit-animation: tracking-in-expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
            animation: tracking-in-expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
            margin-top: 10px;
            border-bottom: 3px black solid;
        }
        </style>

    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!--For the data table -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp; un étudiant:",
                lengthMenu: "Afficher _MENU_ étudiants",
                info: "Affichage de l'étudiant _START_ à _END_ sur _TOTAL_ étudiants",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
    });
    </script>
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <!-- js that bring the corespondant emploi from json -->
    <script src="myJS/json.js"></script>
</body>

</html>