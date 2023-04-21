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
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--multi languages script  -->

    <!--JS and Style for the dataTable  -->
    <!-- <script src="myJS/JS/js1.js"></script>
    <script src="myJS/JS/js2.js"></script>
    <script src="myJS/JS/js3.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"> -->

</head>
<script src="multilang.js"></script>

<!-- <script>
var multilang;

function onLoad() {
    // create object, load JSON file, default to 'nl', and callback to initList when ready loading
    multilang = new MultiLang('languages.json', 'nl', this.initList);

    // alternatively
    //multilang = new MultiLang('languages.json', null, this.initList); // default to browser language
    //multilang = new MultiLang('languages.json'); // only load JSON, no callback
}

function langSelectChange(sel) {
    // switch to selected language code
    multilang.setLanguage(sel.value);

    // refresh labels
    refreshLabels();
}

function initList() {
    // get language list element
    var list = document.getElementsByName("listlanguages")[0];
    // clear all options
    list.options.length = 0;

    // add all available languages
    for (var key in multilang.phrases) {
        // create new language option
        var lang = document.createElement("option");
        lang.value = key;
        lang.innerHTML = multilang.phrases[key]['langdesc'];

        // append to select element
        list.appendChild(lang);
    }

    refreshLabels();
}

function refreshLabels() {

    // Basically do the following for all document elements:
    //document.getElementById("Options").textContent = multilang.get("Options");

    // loop through all document elements
    var allnodes = document.body.getElementsByTagName("*");

    for (var i = 0, max = allnodes.length; i < max; i++) {
        // get id current elements
        var idname = allnodes[i].id;
        // if id exists, set get id current elements
        if (idname != '') {
            allnodes[i].textContent = multilang.get(idname);
        };
    };
}
</script> -->



<body>
    <script>
        function go() {

            document.location.href = 'test-list.php';
        }
    </script>



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
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark w-100">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="http://ecampus-ests.uca.ma/pluginfile.php/1/theme_moove/logo/1606691469/imageonline-co-transparentimage.png" width="200px" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span class="logo-text">
                            <img src="plugins/images/logo-text.png" alt="homepage" />
                            </span> -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <?php
                            $doc = new DOMDocument();
                            $doc->load('./XML/xml1.xml');
                            $root = $doc->documentElement;
                            $users = $root->getElementsByTagName('users')[0];
                            //there is the user elements in the array '$user'.
                            $user = $users->getElementsByTagName('user');
                            ?>
                            <a class="profile-pic" href="#">
                                <img src="http://www.ests.uca.ma/wp-content/uploads/2021/05/AChekroun.png" alt="user-img" width="40" height="38" class="img-circle"><span class="text-white font-medium">
                                    <?php $i = 0; ?>
                                    <?php foreach ($user as $elem) {
                                        if ($elem->getElementsByTagName('roleID')[0]->nodeValue == 5) {
                                            $i++;
                                            echo $elem->getElementsByTagName('name')[0]->nodeValue . ' ' . $elem->getElementsByTagName('first-name')[0]->nodeValue;
                                        }
                                    } ?>
                                </span></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu" id="Dashboard">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ajouter-utilisateur.php" aria-expanded="false">
                                <i class=" fas fa-user-plus" aria-hidden="true"></i>
                                <span class="hide-menu">Ajouter utilisateur</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Les Agents de scolarité</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Les Chefs département</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Les Chefs des filières</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Les professeurs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                <!-- onclick="onLoad()" -->
                                <select name="listlanguages" onchange="langSelectChange(this)">
                                    <option value="en" id="en">en</option>
                                    <option value="de" id="de">de</option>
                                </select>
                            </a>

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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <center><h1>Filiere</h1></center>  
            <div>
                <table>
                    <thead>
                        <th>Matiere</th>
                        <th>Nom_Etudiant</th>
                    </thead>
                        <?php
                         //echo "<tr><td>taha</td></tr>"; 
                $doc = new DOMDocument();
                $doc->load('./XML/xml2.xml');
                $xpath = new DOMXPath($doc);
                $root = $doc->documentElement;
                $absences=$root->getElementsByTagName('abscences')[0];
                $abscence=$absences->getElementsByTagName('abscence');
                $seances=$root->getElementsByTagName('seances')[0];
                $seance=$seances->getElementsByTagName('seance');
                $students=$root->getElementsByTagName('students')[0];
                $student=$students->getElementsByTagName('student');
                $matieres=$root->getElementsByTagName('matieres')[0];
                $matiere=$matieres->getElementsByTagName('matiere');
                $modules=$root->getElementsByTagName('modules')[0];
                $module=$modules->getElementsByTagName('module');
                $filieres = $xpath->query('//filieres/filiere');
                $matieres = array();
                foreach ($filieres as $filiere) {
                    if ($filiere->getAttribute('id')==$_SESSION['filmod']) {
                        echo '     les matieres de la filiere  <b>' . $filiere->getElementsByTagName('name')[0]->nodeValue . '</b> Sont : ';
                $modules = $xpath->query('//modules/module');
                foreach ($modules as $mdl) {
                if ($mdl->getElementsByTagName('filiereId')[0]->nodeValue == $filiere->getAttribute('id')) {
                $matieres = $xpath->query('//matieres/matiere');
                foreach ($matieres as $mtr) {
                if ($mtr->getElementsByTagName('moduleId')[0]->nodeValue == $mdl->getAttribute('id')) {
                    echo '<tr>
                            <td>';echo ' ' . $mtr->getElementsByTagName('name')[0]->nodeValue.' - ';echo '</td>
                            <td><!-- Large modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <h1>Liste des etudiants</h1>
                                            <table>
                                                <thead>
                                                    <th>Nom & Prenom</th>
                                                    <th>Nbr Heures</th>
                                                    </thead>';
                                                        /*foreach ($abscence as $abs) {
                                                            // code...
                                                            foreach ($seance as $sc) {
                                                                // code...
                                                                if($abs->getAttribute('seanceId')==$sc->getAttribute('id') and $sc->getElementsByTagName('matiereId')==$mt->getAttribute('id')){
                                                                    echo '<tr>
                                                                    <td>'.$sc->getElementsByTagName('id_etudiant').'</td>
                                                                    <td></td>
                                                                        </tr>';
                                                                }
                                                            }
                                                            
                                                        }
                                                    }*/
                                                    /*foreach ($studentsid as $id) {
                                                    echo '<tr>
                                                            <td>'.$id->nodeValue.'</td>
                                                         </tr>';
                                                     }*/
                                                     echo'
                                            </table>

                                         </div>
                                    </div>
                                </div>
                            </td>
                         </tr>'; 
                    }
                        // code...
            }
                
                
            }
        }
    }
}echo'</table>';

                
                
                /*$i=0;
                foreach ($module as $mod) {
                    // code...
                    if($mod->getElementsByTagName('filiereId')==$_SESSION['filmod']){
                        $modf[$i]=$mod;
                        $i++;
                    }
                }
                foreach ($matiere as $mat) {
                    // code...
                    if($mat->getElementsByTagName('moduleId')==$mof[0]->nodeValue){
                        $modf[$i]=$mod;
                        $i++;
                    }
                }*/
                /*$modules = $xpath->query("//module[filiereId='" . $_SESSION['filmod'] . "']");
                foreach ($modules as $mod) {
                    // code...
                    $matieres = $xpath->query("//matiere[moduleId='" . $mod->getAttribute('id') . "']");
                     foreach ($abscence as $abs) {
                       // echo "<tr><td>taha</td></tr>";            
                    $idseance = $abs->getAttribute('seanceId');
                    $studentsid = $abs->getElementsByTagName('studentId');
                    for($i=0;$i<count($abscence);$i++) {
                        foreach ($seance as $sc) {
                            if($idseance==$sc->getAttribute('id')){
                                $matid=$sc->getElementsByTagName('matiereId')[0]->nodeValue;
                            }
                            foreach ($matiere as $mt) {
                            if($matid==$mt->getAttribute('id')){
                                $matname=$mt->getElementsByTagName('name')[0]->nodeValue;
                            }
                        }
                        }
                        
                        //echo "<tr><td>taha</td></tr>";
                        
                    }        
                }*/
                
               /* foreach ($module as $mod) {
                    if($mod->getElementsByTagName('filiereId')==$_SESSION['filmod']){
                        foreach ($matiere as $mat) {
                            // code...
                            if($mat->getElementsByTagName('moduleId')==$mod){
                            
                            }
                        }
                    }
                    // code...
                }*/
                 //echo "<tr><td>taha</td></tr>"; 
                
                   /* echo '<tr>
                        <td></td>
                        <td><!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <h1>Liste des etudiants</h1>
                    <table>
                     <thead>
                         <th>Nom & Prenom</th>
                         <th>Nbr Heures</th>
                     </thead>
                     ';
                      foreach ($studentsid as $id) {
                         echo '<tr>
                            <td>'.$id->nodeValue.'</td>
                                </tr>';
                     } echo'
                     
                 </table>

    </div>
  </div>
</div>

</td>
                    </tr>';
                 //} */
                 ?>

                </table>
                <style type="text/css">
                    th{
                        text-align: center;
                    }
                </style>
                

            </div>
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