<?php
session_start();
    if(isset($_SESSION['pseudo'])){
$pseudo=$_SESSION['pseudo'];

    // headerFunction();
    // other code here

?>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>la liste des étudiants :</title>
    <script src="JS/js1.js"></script>
    <script src="JS/js2.js"></script>
    <script src="JS/js3.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@webpixels/css@1.1.5/dist/index.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/1100e992a4.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php 
    if (isset($_POST['seanceId'])) {
          $_SESSION['seanceId'] = $_POST['seanceId'];
          $_SESSION['semaineDebut'] = $_POST['semaineDebut'];
          $_SESSION['semaineFin'] = $_POST['semaineFin'];
          // $_SESSION['filiereId'] = $_POST['filiereId'];
          $_SESSION['semestreId'] = $_POST['semestreId'];
          $_SESSION['groupId'] = $_POST['groupId'];
          $_SESSION['selectedWeek'] = $_POST['selectedWeek'];
      }
          // $emploiId= $_SESSION['emploiId'];
          $seanceId = $_SESSION['seanceId'];
          $semaineDebut = $_SESSION['semaineDebut'];
          $semaineFin = $_SESSION['semaineFin'];
          $semestreId = $_SESSION['semestreId'];
          $groupId = $_SESSION['groupId'];
          $selectedWeek = $_SESSION['selectedWeek'];

        ?>
    <div class="container">
        <div
            style="padding: 0 30px;background-color: black;color: white;width: 90%;margin:0 auto 40px auto;font-size: 20px;text-align: center;">
            cette seance est de
            groupe <?php echo $groupId?> dans la semaine
            <?php echo $selectedWeek?></div>


        <div class="table-responsive">

            <form method="post">
                <table class="table table-hover table-nowrap" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Num</th>
                            <th scope="col">photo</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Group Id</th>
                            <th>absent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script>
                        function persistCheckbox(checkboxClass) {
                            // Get a list of all checkbox elements with the specified class
                            const checkboxes = document.querySelectorAll(`.${checkboxClass}`);

                            // Iterate over the checkboxes
                            checkboxes.forEach(checkbox => {
                                // Set the initial state of the checkbox based on the value stored in local storage
                                checkbox.checked = localStorage.getItem(checkbox.id) === 'true';

                                // Add an event listener to the checkbox to update the value in local storage when it is clicked
                                checkbox.addEventListener('click', function() {
                                    localStorage.setItem(checkbox.id, this.checked);
                                });
                            });
                        }
                        </script>
                        <?php
                   
                    
                    function checkIfChecked($studentId, $i){
                        $doc = new DOMDocument();
                        $doc->load('../../auth/xml1.xml');
                        // global $doc;
                        // Get a list of all student ID elements
                        $studentIdElements = $doc->getElementsByTagName('studentId');

                        // Iterate over the student ID elements
                        $found = false;
                        foreach ($studentIdElements as $idElement) {
                            if ($idElement->nodeValue == $studentId) {
                                $found = true;
                                break;
                            }
                        }

                        // Output the checkbox element with the checked attribute if the student ID was found
                        if ($found) {
                            return '<input type="checkbox" id="checkbox' . $i . '" class="myCheckbox" name="checkedStudents[]" value="' . $studentId . '" checked>';
                        }
                        if (!$found) {
                            return '<input type="checkbox" id="checkbox' . $i . '" class="myCheckbox" name="checkedStudents[]" value="' . $studentId . '">';
                        }
                    }
                    function updateXML($studentId){
                        global $abscences;
                        global $abscence;
                        global $seanceId;
                        global $doc;
                        global $pseudo;
                        global $selectedWeek;
                        global $semestreId;
                        $abscenceElements = $abscences->getElementsByTagName('abscence');

                        // Initialize a flag to track whether an element with the specified seanceId value was found
                        $elementFound = false;

                        // Loop through the DOMNodeList
                        for ($i = 0; $i < $abscenceElements->length; $i++) {
                            // Get the current element
                            $abscenceElement = $abscenceElements->item($i);

                            // Get the value of the seanceId attribute
                            $seanceIdValue = $abscenceElement->getAttribute('seanceId');

                            // Check the value of the seanceId attribute
                            if ($seanceIdValue == $seanceId.$semestreId.$selectedWeek) {
                                // If the element has the specified seanceId value, get the studentId elements of the current abscence element
                                $studentIdElements = $abscenceElement->getElementsByTagName('studentId');
                                // Set the flag to true
                                $elementFound = true;
                                // Initialize a flag to track whether a studentId element with the specified value was found
                                $studentIdFound = false;
                                // Loop through the studentId elements
                                for ($j = 0; $j < $studentIdElements->length; $j++) {
                                    // Get the current studentId element
                                    $studentIdElement = $studentIdElements->item($j);
                                    // Check the value of the studentId element
                                    if ($studentIdElement->nodeValue == $studentId) {
                                        // If the studentId element has the specified value, set the flag to true and break the loop
                                        $studentIdFound = true;
                                        // $abscenceElement->removeChild($studentIdElement);
                                        break;
                                    }
                                }
                                // Check if the studentId element was found
                                if (!$studentIdFound) {
                                    // If the studentId element was not found, create a new studentId element
                                    $newStudentIdElement = $doc->createElement('studentId', $studentId);
                                    // Append the studentId element to the abscence element
                                    $abscenceElement->appendChild($newStudentIdElement);
                                }
                                // Break the loop
                                break;
                            }
                        }

                        if (!$elementFound) {
                            $abscenceElement = $doc->createElement('abscence');
                            $abscenceElement->setAttribute('seanceId', $seanceId.$semestreId.$selectedWeek);
                            $studentIdElement = $doc->createElement('studentId', $studentId);
                            $abscenceElement->appendChild($studentIdElement);
                            $abscences->appendChild($abscenceElement);
                        }

                        $doc->save('../../auth/xml1.xml');
                    }

                    // emove element from xml
                    function removeStudent($studentId)
                    {
                        global $abscences;
                        global $abscence;
                        global $seanceId;
                        global $doc;
                        global $pseudo;
                        global $selectedWeek;
                        global $semestreId;
                        $abscenceElements = $abscences->getElementsByTagName('abscence');

                        // Initialize a flag to track whether an element with the specified seanceId value was found
                        $elementFound = false;

                        // Loop through the DOMNodeList
                        for ($i = 0; $i < $abscenceElements->length; $i++) {
                            // Get the current element
                            $abscenceElement = $abscenceElements->item($i);

                            // Get the value of the seanceId attribute
                            $seanceIdValue = $abscenceElement->getAttribute('seanceId');

                            // Check the value of the seanceId attribute
                            if ($seanceIdValue == $seanceId.$semestreId.$selectedWeek) {
                                // If the element has the specified seanceId value, get the studentId elements of the current abscence element
                                $studentIdElements = $abscenceElement->getElementsByTagName('studentId');
                                // Set the flag to true
                                $elementFound = true;
                                // Initialize a flag to track whether a studentId element with the specified value was found
                                $studentIdFound = false;
                                // Loop through the studentId elements
                                for ($j = 0; $j < $studentIdElements->length; $j++) {
                                    // Get the current studentId element
                                    $studentIdElement = $studentIdElements->item($j);
                                    // Check the value of the studentId element
                                    if ($studentIdElement->nodeValue == $studentId) {
                                        // If the studentId element has the specified value, set the flag to true and break the loop
                                        $studentIdFound = true;
                                        $abscenceElement->removeChild($studentIdElement);
                                        break;
                                    }
                                }
                                break;
                            }
                        }
                        $doc->save('../../auth/xml1.xml');
                    }
                        global $groupId;
                        $doc = new DOMDocument();
                    $doc->load('../../auth/xml1.xml');
                    // Get the abscences element
                    $abscences = $doc->getElementsByTagName('abscences')->item(0);
                    $xpath = new DOMXPath($doc);

                    // $groupId='GI2';
                    $i = 0;
                    $students = $xpath->query("//student[groupId='" . $groupId . "']");
                    // var_dump($students) ;
                    // echo $students;
                    // list of student loooop
                    foreach ($students as $student) {
                        $i++;

                        $studentId = $student->getAttribute('id');
                        $name = $student->getElementsByTagName('name')->item(0)->nodeValue;
                        $group = $student->getElementsByTagName('groupId')->item(0)->nodeValue;
                        $numGroup = $xpath->query("//group[@id='" . $group . "']/num")->item(0)->nodeValue;
                        $tabStudentId[] = $studentId;

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><img alt="..." src="imad.png" class="avatar avatar-sm rounded-circle me-2 im" /></td>
                            <td><?php echo $name; ?></td>
                            <td> <?php echo $numGroup; ?></td>
                            <td class="text-end">
                                <input type="hidden" name="checkedStudents1[]" value="<?php echo $studentId ?>">
                                <input type="checkbox" id="checkbox<?php echo $i ?>" class="myCheckbox"
                                    name="checkedStudents[]" value="<?php echo $studentId ?>">
                                <script>
                                persistCheckbox('myCheckbox');
                                </script>
                            </td>
                        </tr>
                        <?php }

                    if (isset($_POST['checkAbsent'])) {
                        // global $tabStudentId;
                        // $IDstudents1 = $_POST['checkedStudents1'];
                        if (array_key_exists('checkedStudents', $_POST) && $_POST['checkedStudents'] !== null) {
                            $IDstudents = $_POST['checkedStudents'];
                            // $diff = array_diff($IDstudents1,$IDstudents);
                            $diff = array_diff($tabStudentId, $IDstudents);
                            foreach ($IDstudents as $IDstudent) {
                                if ($IDstudent) {
                                    updateXML($IDstudent);
                                }
                            }
                            foreach ($diff as $val) {
                                removeStudent($val);
                            }
                        } else {
                            $diff = $tabStudentId;
                            foreach ($diff as $val) {
                                removeStudent($val);
                            }
                        }
                        // header('location:../dashboard.php');
                    }
               
                    ?>
                    </tbody>


                </table>
                <button type="submit" name="checkAbsent" id="saveAbsences">save</button>
            </form>
            <button id="retour" onclick="window.location.replace('../dashboard.php')">Retour</button>
        </div>
    </div>


    <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                processing: " Traitement en cours...",
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

</html>
<style>
table td {
    font-size: 100% !important;
}

table th {
    font-size: 85% !important;
}

input[type="checkbox"] {
    font-size: 10px;
    /* sets the font size of the checkbox */
    width: 25px;
    /* sets the width of the checkbox */
    height: 25px;
    /* sets the height of the checkbox */
    margin-right: 20px;
}

.im {
    width: 55px;
    height: 55px;
}

.container {

    margin-top: 40px;
}

#saveAbsences,
#retour {
    background-color: #4CAF50;
    /* Green */
    border: none;
    color: white;
    padding: 10px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 30px 2px;
    cursor: pointer;
    border-radius: 5px;
    float: right;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

#saveAbsences:hover {
    background-color: #3e8e41;
}

#retour {
    position: relative;
    margin-right: 100px;
    bottom: 0px;
    background-color: rgb(181, 139, 253);
    color: black;
    font-weight: 500;
}

#retour:hover {
    background-color: rgb(120, 45, 232);
}
</style>
</body>

</html>
<?php
  
} else{
  header('location: ../../logOut.php');
}
 ?>