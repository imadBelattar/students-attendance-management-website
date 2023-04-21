<?php


//add new user function.
function addUser()
{
    //work with our XML file which is in '../auth/xml1.xml' directory :
    //we create an instance of the class 'DOMDocument' to manipulate our XML.
    $doc = new DOMDocument();
    $doc->load('../auth/xml1.xml');
    $xpath = new DOMXPath($doc);
    //here is how we could get the root element, the 'database' element.
    $root = $doc->documentElement;
    // as long as we have only one users element inside the database root element
    // in which we'll have our users whether a prof or a departement....
    // then we used the following code to get that lonely element ( which means it has no brothers elements) .
    $users = $root->getElementsByTagName('users')[0];
    //Find the highest current ID among the existing user elements:
    $maxId = 0;
    foreach ($users->getElementsByTagName('user') as $user) {
        $id = $user->getAttribute('id');
        if ($id > $maxId) {
            $maxId = $id;
        }
    }
    //Create the new user element and set its id attribute:
    $newUser = $doc->createElement('user');
    $newUser->setAttribute('id', $maxId + 1);
    //Create the name, first-name, pseudo, password, and role elements and set their values:
    $name = $doc->createElement('name', $_POST['name']);
    $firstName = $doc->createElement('first-name', $_POST['first-name']);
    $pseudo = $doc->createElement('pseudo', $_POST['pseudo']);
    $phone = $doc->createElement('phone', $_POST['phone']);
    $password = $doc->createElement('password', $_POST['password']);
    $roleId = $doc->createElement('roleID', $_POST['roleId']);
    if ($_POST['roleId'] == 2) {
        $depID = $_POST['additionalSelect'];
        $chefd_ID = $maxId + 1;
        $dep = $xpath->query("//departments/department[@id='$depID']")[0];
        $chefd = $doc->createElement('chefd', $chefd_ID);

        if ($dep->getElementsByTagName('chefd')->item(0) != null) {
            $dep->removeChild($dep->getElementsByTagName('chefd')->item(0));
        }
        $dep->appendChild($chefd);
    } else if ($_POST['roleId'] == 3) {
        $flrID = $_POST['additionalSelect'];
        $cheff_ID = $maxId + 1;
        $flr = $xpath->query("//filieres/filiere[@id='$flrID']")[0];
        $cheff = $doc->createElement('cheff', $cheff_ID);

        if ($flr->getElementsByTagName('cheff')->item(0) != null) {
            $flr->removeChild($flr->getElementsByTagName('cheff')->item(0));
        }
        $flr->appendChild($cheff);
    }
    //Append the new child elements to the user element:
    $newUser->appendChild($name);
    $newUser->appendChild($firstName);
    $newUser->appendChild($pseudo);
    $newUser->appendChild($phone);
    $newUser->appendChild($password);
    $newUser->appendChild($roleId);
    //Append the new user element to the users element:
    $users->appendChild($newUser);
    //Save the modified XML document:
    $doc->save('../auth/xml1.xml');
    if ($doc->save('../auth/xml1.xml')) {
        $_SESSION['userAdded'] = true;
    } else {
        // An error occurred while saving the element
        $_SESSION['userAdded'] = false;
    }
}

function displayUser($roleId)
{
    $doc2 = new DOMDocument();
    $doc2->load('../../auth/xml1.xml');
    $root = $doc2->documentElement;
    $users = $root->getElementsByTagName('users')[0];
    $userElements = $users->getElementsByTagName('user');

    echo '<div class="container" id="wrapper1" >
    <div class="table-responsive">
        <table class="table table-hover table-nowrap" id="myTable">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Num</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Pseudo nom</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col" style="text-align: center; !important">action</th>
                </tr>
            </thead>
            <tbody>';
    $i = 1;
    foreach ($userElements as $user) {
        if ($user->getElementsByTagName('roleID')[0]->nodeValue == $roleId) {

            echo
            '<tr id="';
            echo $user->getAttribute('id');
            echo '">
                        <td>';
            echo $i++;
            echo '</td>';

            echo ' 
                        <td>
                            <p>';
            echo $user->getElementsByTagName('name')[0]->nodeValue;
            echo
            '</p>
                        </td>
                        <td>
                        ';
            echo $user->getElementsByTagName('first-name')[0]->nodeValue;
            echo
            '
                        </td>
                        <td> ';
            echo $user->getElementsByTagName('pseudo')[0]->nodeValue;
            echo
            '</td>
                     <td>';
            echo $user->getElementsByTagName('phone')[0]->nodeValue;
            echo '</td>';

            $userID_name = $user->getAttribute('id') . '/' . $user->getElementsByTagName('name')[0]->nodeValue;
            echo '<td class="action"><button type="button" onclick="delete_user(\'' . $userID_name . '\');" class="btn btn-warning dg delete" data-toggle="modal" data-target="#deleteModal">Supprimer</button>
                    <a href="../modify-user.php?idUser=' . $userID_name . ' "> <button type="button" class="btn btn-primary" >Modifier</button></a>
                       </td>
                    </tr>';
        }
    }

    echo '</tbody>
        </table>
    </div>
</div>';
}
//afficher rôle function
function afficherRole($roleId)
{
    $roleName = 'there is no role !!!!';
    $doc = new DOMDocument();
    $doc->load('../auth/xml1.xml');
    $root = $doc->documentElement;
    $roles = $root->getElementsByTagName('roles')[0];
    $roleElements = $roles->getElementsByTagName('role');
    foreach ($roleElements as $role) {
        if ($role->getAttribute('id') == $roleId) {
            $roleName = $role->nodeValue;
            break;
        }
    }
    $_SESSION['roleName'] = 'Le ' . $roleName;
    $words = explode(" ", $roleName);
    $first_word = $words[0];
    $wordWithS = $first_word . 's';
    return $roleName = str_replace($first_word, $wordWithS, $roleName);
}
//delete a user by the super admin function :
function deleteUser($idUser)
{
    $dom = new DOMDocument();
    $dom->load('../../auth/xml1.xml');

    $xpath = new DOMXPath($dom);
    $words = explode("/", $idUser);
    $id_User = $words[0];
    $name_User = $words[1];
    $user_element = $xpath->query("//users/user[@id='$id_User']")[0];

    if ($user_element) {
        if ($user_element->parentNode->removeChild($user_element)) {
            $_SESSION['userDeleted'] = true;
            $_SESSION['userName'] = $name_User;
        } else {
            $_SESSION['userDeleted'] = false;
        }
        $dom->save('../../auth/xml1.xml');
    }
}
// The statistics function :
function filiere_absence()
{
    $dom = new DOMDocument();
    $dom->load('../auth/xml1.xml');
    $xpath = new DOMXPath($dom);
    $root = $dom->documentElement;
    $filieres = $root->getElementsByTagName('filieres')[0];
    $filiereElements = $filieres->getElementsByTagName('filiere');
    foreach ($filiereElements as $filiere) {
        $filiere_name = $filiere->getElementsByTagName("name")->item(0)->nodeValue;
        $absences = $root->getElementsByTagName('abscences')[0];
        $absElements = $absences->getElementsByTagName('abscence');
        $total_abscences = 0;
        foreach ($absElements as $abscence) {
            $abscent_students = $abscence->getElementsByTagName('studentId');
            foreach ($abscent_students as $student) {
                $studentId = $student->nodeValue;
                $studentAbs = $xpath->query("//students/student[@id='$studentId']")[0];
                $groupID = $studentAbs->getElementsByTagName('groupId')[0]->nodeValue;
                $groupElement = $xpath->query("//groups/group[@id='$groupID']")[0];
                if ($groupElement != null) {
                    $filiereID = $groupElement->getElementsByTagName('filiereId')[0]->nodeValue;
                    $Student_filiere = $xpath->query("//filieres/filiere[@id='$filiereID']")[0];
                    $filiere_name_i = $Student_filiere->getElementsByTagName('name')[0]->nodeValue;
                    if ($filiere_name_i == $filiere_name) {
                        $total_abscences++;
                    }
                }
            }
        }
        echo '<div class="stats-col text-center col-md-3 col-sm-6 scl">
    <div class="circle">
        <span data-purecounter-start="0" data-purecounter-end="' . $total_abscences . '" data-purecounter-duration="1" class="purecounter stats-no"></span>
        ' . $filiere_name . '
    </div>
</div>';
    }
}
//display les departments
function departments()
{
    $dom = new DOMDocument();
    $dom->load('../auth/xml1.xml');
    $root = $dom->documentElement;
    $departments = $root->getElementsByTagName('departments')[0];
    $departmentElements = $departments->getElementsByTagName('department');
    foreach ($departmentElements as $dept) {
        if ($dept->getElementsByTagName('chefd')[0] != null) {
            echo '<option value="' . $dept->getAttribute('id') . '"disabled>';
            echo ' (déja attribué) ';
            echo $dept->getElementsByTagName('name')[0]->nodeValue . '</option>';
        } else {
            echo '<option value="' . $dept->getAttribute('id') . '">';
            echo $dept->getElementsByTagName('name')[0]->nodeValue . '</option>';
        }
    }
}
// display les filieres
function filieres()
{
    $dom = new DOMDocument();
    $dom->load('../auth/xml1.xml');
    $root = $dom->documentElement;
    $filieres = $root->getElementsByTagName('filieres')[0];
    $filiereElements = $filieres->getElementsByTagName('filiere');
    foreach ($filiereElements as $flr) {
        if ($flr->getElementsByTagName('cheff')[0] != null) {
            echo '<option value="' . $flr->getAttribute('id') . '"disabled>';
            echo ' (déja attribué) ';
            echo $flr->getElementsByTagName('name')[0]->nodeValue . '</option>';
        } else {
            echo '<option value="' . $flr->getAttribute('id') . '">';
            echo $flr->getElementsByTagName('name')[0]->nodeValue . '</option>';
        }
    }
}



?>
<script>
    //prevent the form from resubmission*******
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function hide() {
        document.getElementById("target").style.display = "none";
    }
    //this is our JS replace() method which is called by the replaceDivById() method in order to replace 
    //the div inside the "....." div.
</script>
<style>
    .cancel {
        margin-left: 74% !important;
    }
</style>