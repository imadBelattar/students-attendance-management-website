<?php
session_start();
     if(isset($_SESSION['pseudo'])){
include "../includes/head.php";
?>
<title>Agent scholarite</title>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        include "../includes/header.php";
        include "../includes/linkAside.php";

    ?>


    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
            <!-- onclick="onLoad()" -->
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

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title" id="Agent">Student Services Agent</h4>
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

        <div class="container" style="margin-top: 5vh;">
            <!-- ============================================================== -->
            <!-- Three charts -->
            <!-- ============================================================== -->
        </div>
        <div class="row" id="SELECTS">
            <select id="selectSemaine" name="semestreId">
                <!-- onchange="document.location.href='agentS.php'" -->
                <!-- <option selected>Choose a week</option> -->
                <option value="S1" selected id="semestre1">Semestre 1</option>
                <option value="S2" id="semestre2">Semestre 2</option>
            </select>
        </div>
        <div class="calendar" id="emploiSection">
            <!-- <button>Ajouter un Emploi</button> -->
            <header style='padding: 1rem;' id="header"> <button class='secondary'
                    style='align-self: flex-start; flex: 0 0 1'></button>
                <div class='calendar__title' style='display: flex; justify-content: center; align-items: center'>
                    <!-- <h3 style='flex:1;'> -->
                    <!-- </h3> -->
                </div>
                <div style='align-self:flex-start; flex: 0 0 1'></div>
            </header>
            <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
                aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-scrollable'>
                    <div class='modal-content' id="modalContent">
                        <div class='modal-header'>
                            <h5 class='modal-title' id='staticBackdropLabel'>Ajouter une seance</h5>
                            <!-- <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>sss</button> -->
                        </div>
                        <div class='modal-body'>
                            <!-- <form action='' method='post'> -->
                            <div class="row mb-5 mt-5">
                                <div class="col">
                                    <select name="filiereId" id="filiereId"
                                        onchange="createSelect('filiereId', 'module', 'modName','filiereId',false);">
                                        <!-- createSelect('filiereId', 'niveau', 'niveauId','filiereId',true); -->
                                        <option selected>Filiere</option>
                                        <option value="GI">GI</option>
                                        <option value="TM">TM</option>
                                        <option value="GIM">GIM</option>
                                        <option value="TIMQ">TIMQ</option>
                                    </select>
                                </div>
                                <div id="modSelect" class="col">
                                    <select name="modName" id="modName"
                                        onchange="createSelect('modName', 'matiere', 'matName','moduleId',false)">
                                        <option selected>Choisir un module</option>
                                    </select>
                                </div>
                                <div id="matSelect" class="col">
                                    <select name="matName" id="matName">
                                        <option selected>Choisir une matiere</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-5 mt-5">
                                <div class="col" id='niveauSelect'
                                    onchange="createSelect('niveauId', 'group', 'groupId','niveauId',true);">
                                    <select name="niveauId" id="niveauId">
                                        <option selected>Niveau</option>
                                        <option value="1">1ere annee</option>
                                        <option value="2">2eme annee</option>
                                    </select>
                                </div>
                                <div class="col" id='grpSelect'>
                                    <select name="groupId" id="groupId">
                                        <option selected>Groupe</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="duration" id="duration">
                                        <option selected>Duration</option>
                                        <option value="1">1H</option>
                                        <option value="2">2H</option>
                                        <option value="3">3H</option>
                                        <option value="4">4H</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-5 mt-5">
                                <div class="col">
                                    <select name="salle" id="salle">
                                        <option selected>La salle</option>
                                        <option value="salle 1">1</option>
                                        <option value="salle 2">2</option>
                                        <option value="salle 3">3</option>
                                        <option value="salle 4">4</option>
                                        <option value="salle 5">5</option>
                                        <option value="salle 6">6</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="semaineDebut" id="semaineDebut">
                                        <option selected>semaine Debut</option>
                                        <option value="S1">Semaine 1</option>
                                        <option value="S2">Semaine 2</option>
                                        <option value="S3">Semaine 3</option>
                                        <option value="S4">Semaine 4</option>
                                        <option value="S5">Semaine 5</option>
                                        <option value="S6">Semaine 6</option>
                                        <option value="S7">Semaine 7</option>
                                        <option value="S8">Semaine 8</option>
                                        <option value="S9">Semaine 9</option>
                                        <option value="S10">Semaine 10</option>
                                        <option value="S11">Semaine 11</option>
                                        <option value="S12">Semaine 12</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="semaineFin" id="semaineFin">
                                        <option selected>semaine Fin</option>
                                        <option value="S1">Semaine 1</option>
                                        <option value="S2">Semaine 2</option>
                                        <option value="S3">Semaine 3</option>
                                        <option value="S4">Semaine 4</option>
                                        <option value="S5">Semaine 5</option>
                                        <option value="S6">Semaine 6</option>
                                        <option value="S7">Semaine 7</option>
                                        <option value="S8">Semaine 8</option>
                                        <option value="S9">Semaine 9</option>
                                        <option value="S10">Semaine 10</option>
                                        <option value="S11">Semaine 11</option>
                                        <option value="S12">Semaine 12</option>
                                    </select>
                                </div>
                                <style>
                                .row {
                                    /* border: 1px solid black; */
                                    /* padding: 10px; */
                                }
                                </style>
                            </div>

                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button name='ajouterSeance' class='btn btn-primary' id="AjouterSeances"
                                    onclick="ajouterSeance()" data-bs-dismiss='modal'>Ajouter</button>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
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
                                <td id="H1D1" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H1D2" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H1D3" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                                </td>
                                <td id="H1D4" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H1D5" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H1D6" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                            </tr>
                            <tr>
                                <td class='headcol'>
                                    <div style="position: absolute;top: 0;">9:30</div>
                                    <div style="position: absolute;bottom: 0;">10:20</div>
                                </td>
                                <td id="H2D1" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H2D2" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H2D3" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H2D4" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                                </td>
                                <td id="H2D5" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H2D6" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                            </tr>
                            <tr class='Break20M'>


                            </tr>
                            <tr>
                                <td class='headcol'>10:40</td>
                                <td id="H3D1" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H3D2" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H3D3" class='past' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                                </td>
                                <td id="H3D4" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H3D5" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H3D6" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                            </tr>
                            <tr>
                                <td class='headcol'>
                                    <div style="position: absolute;top: 0;">11:30</div>
                                    <div style="position: absolute;bottom: 0;">12:30</div>
                                </td>
                                <td id="H4D1" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H4D2" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H4D3" class='past' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                                </td>
                                <td id="H4D4" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H4D5" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H4D6" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                            </tr>
                            <tr>

                            </tr>
                            <tr>
                                <td class='headcol'>14:30</td>
                                <td id="H5D1" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H5D2" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H5D3" class='past' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                                </td>
                                <td id="H5D4" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H5D5" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H5D6" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                            </tr>
                            <tr>
                                <td class='headcol'>
                                    <div style="position: absolute;top: 0;">15:30</div>
                                    <div style="position: absolute;bottom: 0;">16:20</div>
                                </td>
                                <td id="H6D1" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H6D2" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H6D3" class='past' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                                </td>
                                <td id="H6D4" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H6D5" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H6D6" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                            </tr>
                            <tr>


                            </tr>
                            <tr>
                                <td class='headcol'>16:40</td>
                                <td id="H7D1" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H7D2" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H7D3" class='past' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                                </td>
                                <td id="H7D4" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H7D5" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H7D6" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                            </tr>
                            <tr>
                                <td class='headcol'>17:30</td>
                                <td id="H8D1" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H8D2" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H8D3" class='past' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                                </td>
                                <td id="H8D4" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H8D5" data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                                <td id="H8D6" class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'></td>
                            </tr>
                            <tr>
                                <td class='headcol' style="border:none ;">18:30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col "><button id="saveAbsences" onclick="alertSaveEmploi()">save emploi</button>
        </div>
        <!-- <div class="col "><button id="saveAbsences" onclick="alertSaveEmploi()">save emploi</button></div> -->
    </div>

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center"> 2022 © EST safi <a href="#">Projet XML</a></footer>
    <!-- ========================================================= -->
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
    <?php
    include "../includes/jsLinks.php";
    ?>
    <!-- js that bring the corespondant emploi from json -->
    <script src="myJS/ajentS.js"></script>
    <script src="../auth/lang.js"></script>
</body>

</html>
<?php
  
} else{
  header('location: ../logOut.php');
}
 ?>