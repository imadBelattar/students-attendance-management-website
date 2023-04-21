<?php
session_start();
if(isset($_SESSION['pseudo'])){

$pseudo=$_SESSION['pseudo'];
include "../includes/head.php";
?>
<title>Professeur</title>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title" id="Dashboard2">Dashboard</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        <ol class="breadcrumb ms-auto">
                            <li><a href="#" class="fw-normal" id="Dashboard3">Dashboard</a></li>
                        </ol>

                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container" style="margin-top: 5vh;">
            <!-- ============================================================== -->
            <!-- Three charts -->
            <!-- ============================================================== -->
        </div>
        <?php function BringSeances($semestreId){
                                $pseudo=$_SESSION['pseudo'];
                                // if(isset($_GET['semestre'])){$semestre = $_GET['semestre'];}else{$semestre='S1';}
                                $doc = new DOMDocument();
                                $doc->load('../auth/xml1.xml');
                                $xpath = new DOMXPath($doc);
                                $userSeance = $xpath->query("//userSeance[@userId='$pseudo']")->item(0);
                                if($userSeance !== null){
                                $seanceIds = $xpath->query("seanceId", $userSeance);
                                foreach($seanceIds as $seanceId){
                                    // $arrOfSeanceId[]= $seanceIds->item(0)->nodeValue;
                                    $var= $seanceId->nodeValue;
                                        // echo "var==".$var."<br>";
                                    $seanceNode = $xpath->query("//seance[@id='$var' and @semestreId='$semestreId']")->item(0);
                                    if($seanceNode) {
                                    $semestreIdNode = $xpath->query("@semestreId", $seanceNode)->item(0);
                                    $groupIdNode = $xpath->query("groupId", $seanceNode)->item(0);
                                    // $seanceNode = $xpath->query("//group[@id='$groupIdNode->nodeValue']/")->item(0);
                                    $matiereIdNode = $xpath->query("matiereId", $seanceNode)->item(0);
                                    $salleNode = $xpath->query("salle", $seanceNode)->item(0);
                                    // $durationNode = $xpath->query("duration", $seanceNode)->item(0);
                                    $semaineDebutNode = $xpath->query("semaineDebut", $seanceNode)->item(0);
                                    $semaineFinNode = $xpath->query("semaineFin", $seanceNode)->item(0);
                                    $arrOfSeanceId=explode("_",$var);
                                    array_pop($arrOfSeanceId); // deletes the last element
                                    foreach($arrOfSeanceId as $element){
                                    echo "<script>document.getElementById('".$semestreId."').addEventListener('click', function() {afficheSeanceInEmploi('". $element."','".$groupIdNode->nodeValue."','".$var."','".$matiereIdNode->nodeValue."','".$semaineDebutNode->nodeValue."','".$semaineFinNode->nodeValue."','".$salleNode->nodeValue."','".$semestreIdNode->nodeValue."');});"."</script>";
                                    }
                                    }
                                }
                            }}
                            ?>

        <!-- <div class="row calendar"> -->
        <div class="row" id="SELECTS">

            <div class="" id="selectSemestre">

            </div>
        </div>

        <div class="calendar" id="emploiSection">
            <header style="padding: 1rem;" id="header">
                <div class="showButtons">
                    <button id="S1" style="background-color: rgb(134, 205, 255);">Show S1</button>
                    <button id="S2" style="background-color: rgb(164, 134, 255);">Show S2</button>
                </div>
            </header>

            <div class='outer'>
                <table>
                    <thead>
                        <tr>
                            <th class='headcol'></th>
                            <th id="Monday">Monday</th>
                            <th id="Tuesday">Tuesday</th>
                            <th id="Wednesday">Wednesday</th>
                            <th id="Thursday">Thursday</th>
                            <th id="Friday">Friday</th>
                            <th id="Saturday">Saturday</th>
                        </tr>
                    </thead>
                </table>

                <div class='wrap'>
                    <table class='offset'>
                        <style>
                        .offset td:hover {
                            /* border: 1px solid red; */
                            background-color: rgb(255, 0, 0, .5);
                        }

                        .offset .headcol:hover {
                            background-color: transparent;
                        }

                        .clicked {
                            background-color: blue;
                        }

                        .modalContent .Remarque {
                            color: black;
                        }

                        #saveAbsences {
                            background-color: #4CAF50;
                            /* Green */
                            border: none;
                            color: white;
                            padding: 10px 40px;
                            text-align: center;
                            text-decoration: none;
                            font-size: 16px;
                            cursor: pointer;
                            border-radius: 5px;
                            margin: 4px auto;
                            position: absolute;
                            right: 0;
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                        }

                        #saveAbsences:hover {
                            background-color: #3e8e41;
                        }

                        .rowF {
                            position: relative;
                            margin-left: 47.4%;
                            display: flex;
                            width: 50%;
                        }
                        </style>
                        <tbody>

                            <tr>
                                <td class='headcol'>8:30</td>
                                <td id="H1D1"></td>
                                <td id="H1D2" class=''></td>
                                <td id="H1D3" class=''>
                                </td>
                                <td id="H1D4"></td>
                                <td id="H1D5"></td>
                                <td id="H1D6" class=''></td>
                            </tr>
                            <tr>
                                <td class='headcol'>
                                    <div style="position: absolute;top: 0;">9:30</div>
                                    <div style="position: absolute;bottom: 0;">10:20</div>
                                </td>
                                <td id="H2D1" class=''></td>
                                <td id="H2D2"></td>
                                <td id="H2D3" class=''></td>
                                <td id="H2D4" class=''>
                                </td>
                                <td id="H2D5"></td>
                                <td id="H2D6"></td>
                            </tr>
                            <tr class='Break20M'>
                            </tr>
                            <tr>
                                <td class='headcol'>10:40</td>
                                <td id="H3D1"></td>
                                <td id="H3D2" class=''></td>
                                <td id="H3D3" class='past'>
                                </td>
                                <td id="H3D4"></td>
                                <td id="H3D5"></td>
                                <td id="H3D6" class=''></td>
                            </tr>
                            <tr>
                                <td class='headcol'>
                                    <div style="position: absolute;top: 0;">11:30</div>
                                    <div style="position: absolute;bottom: 0;">12:30</div>
                                </td>
                                <td id="H4D1"></td>
                                <td id="H4D2" class=''></td>
                                <td id="H4D3" class='past'>
                                </td>
                                <td id="H4D4"></td>
                                <td id="H4D5"></td>
                                <td id="H4D6" class=''></td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <td class='headcol'>14:30</td>
                                <td id="H5D1"></td>
                                <td id="H5D2" class=''></td>
                                <td id="H5D3" class='past'>
                                </td>
                                <td id="H5D4"></td>
                                <td id="H5D5"></td>
                                <td id="H5D6" class=''></td>
                            </tr>
                            <tr>
                                <td class='headcol'>
                                    <div style="position: absolute;top: 0;">15:30</div>
                                    <div style="position: absolute;bottom: 0;">16:20</div>
                                </td>
                                <td id="H6D1"></td>
                                <td id="H6D2" class=''></td>
                                <td id="H6D3" class='past'>
                                </td>
                                <td id="H6D4"></td>
                                <td id="H6D5"></td>
                                <td id="H6D6" class=''></td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <td class='headcol'>16:40</td>
                                <td id="H7D1"></td>
                                <td id="H7D2" class=''></td>
                                <td id="H7D3" class='past'>
                                </td>
                                <td id="H7D4"></td>
                                <td id="H7D5"></td>
                                <td id="H7D6" class=''></td>
                            </tr>
                            <tr>
                                <td class='headcol'>17:30</td>
                                <td id="H8D1"></td>
                                <td id="H8D2" class=''></td>
                                <td id="H8D3" class='past'>
                                </td>
                                <td id="H8D4"></td>
                                <td id="H8D5"></td>
                                <td id="H8D6" class=''></td>
                            </tr>
                            <tr>
                                <td class='headcol' style="border:none ;">18:30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php BringSeances('S1');
      BringSeances('S2');?>

        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> 2022 © EST safi <a href="#">Projet XML</a></footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
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
    <script src="../auth/lang.js"></script>
</body>

</html>
<?php
  
} else{
  header('location: ../logOut.php');
}
 
 
 
 
 ?>