<?php
session_start();
if (isset($_SESSION['pseudo'])) {



    if (isset($_POST['mdf-user'])) {
        $name = $_POST['name'];
        $first_name = $_POST['first-name'];
        $pseudo = $_POST['pseudo'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $roleId = $_POST['roleId'];
        $dom = new DOMDocument();
        $dom->load('../auth/xml1.xml');
        $xpath = new DOMXPath($dom);
        $userInfo2 = $_GET['idUser'];
        $words2 = explode("/", $userInfo2);
        $id_User2 = $words2[0];
        $user_element2 = $xpath->query("//users/user[@id='$id_User2']")[0];

        if ($_POST['roleId'] == 2) {
            $depID = $_POST['additionalSelect'];
            $chefd_ID = $id_User2;
            $dep = $xpath->query("//departments/department[@id='$depID']")[0];
            $chefd = $dom->createElement('chefd', $chefd_ID);

            if ($dep->getElementsByTagName('chefd')->item(0) != null) {
                $dep->removeChild($dep->getElementsByTagName('chefd')->item(0));
            }
            $D = $xpath->query("//departments/department[chefd='$id_User2']")[0];
            if ($D != null) $D->removeChild($D->getElementsByTagName('chefd')->item(0));
            $dep->appendChild($chefd);
        } else if ($_POST['roleId'] == 3) {
            $flrID = $_POST['additionalSelect'];
            $cheff_ID = $id_User2;
            $flr = $xpath->query("//filieres/filiere[@id='$flrID']")[0];
            $cheff = $dom->createElement('cheff', $cheff_ID);

            if ($flr->getElementsByTagName('cheff')->item(0) != null) {
                $flr->removeChild($flr->getElementsByTagName('cheff')->item(0));
            }
            $F = $xpath->query("//filieres/filiere[cheff='$id_User2']")[0];
            if ($F != null) $F->removeChild($F->getElementsByTagName('cheff')->item(0));

            $flr->appendChild($cheff);
        }

        $user_element2->getElementsByTagName('name')[0]->nodeValue =  $name;
        $user_element2->getElementsByTagName('first-name')[0]->nodeValue =  $first_name;
        $user_element2->getElementsByTagName('phone')[0]->nodeValue =  $phone;
        $user_element2->getElementsByTagName('password')[0]->nodeValue =  $password;
        $user_element2->getElementsByTagName('pseudo')[0]->nodeValue =  $pseudo;
        $user_element2->getElementsByTagName('roleID')[0]->nodeValue =  $roleId;
        $dom->save('../auth/xml1.xml');
        // header('location: ./basic-table.php?roleId=' . $roleId);
?>
        <script>
            window.parent.location.href = "./basic-table.php?roleId=" + <?php echo $roleId; ?>;
        </script>

    <?php
    }
    $dom = new DOMDocument();
    $dom->load('../auth/xml1.xml');

    $xpath = new DOMXPath($dom);
    $userInfo = $_GET['idUser'];
    $words = explode("/", $userInfo);
    $id_User = $words[0];



    $user_element = $xpath->query("//users/user[@id='$id_User']")[0];
    $user_name = $user_element->getElementsByTagName('name')[0]->nodeValue;
    $user_prenom = $user_element->getElementsByTagName('first-name')[0]->nodeValue;
    $user_pseudo = $user_element->getElementsByTagName('pseudo')[0]->nodeValue;
    $user_phone = $user_element->getElementsByTagName('phone')[0]->nodeValue;
    $user_password = $user_element->getElementsByTagName('password')[0]->nodeValue;
    $roleID = $user_element->getElementsByTagName('roleID')[0]->nodeValue;
    $userRoleName = $xpath->query("//roles/role[@id='$roleID']")[0];

    //for modification the users
    //display les departments
    function departmentsM()
    {
        global $id_User;
        $dom = new DOMDocument();
        $dom->load('../auth/xml1.xml');
        $root = $dom->documentElement;
        $departments = $root->getElementsByTagName('departments')[0];
        $departmentElements = $departments->getElementsByTagName('department');
        $xpath = new DOMXPath($dom);
        $dept = $xpath->query("//department[chefd='$id_User']")[0];
        $owned_dept_id = 0;

        if ($dept != null) {
            $owned_dept_id = $dept->getAttribute('id');
            echo '<option value="' . $dept->getAttribute('id') . '">' . '(votre department) ' . $dept->getElementsByTagName('name')[0]->nodeValue . '</option>';
        }
        foreach ($departmentElements as $dept) {
            if ($dept->getAttribute('id') != $owned_dept_id) {
                echo '<option value="' . $dept->getAttribute('id') . '">' . $dept->getElementsByTagName('name')[0]->nodeValue . '</option>';
            }
        }
    }
    // display les filieres
    function filieresM()
    {
        global $id_User;
        $dom = new DOMDocument();
        $dom->load('../auth/xml1.xml');
        $root = $dom->documentElement;
        $filieres = $root->getElementsByTagName('filieres')[0];
        $filiereElements = $filieres->getElementsByTagName('filiere');
        $xpath = new DOMXPath($dom);
        $flr = $xpath->query("//filiere[cheff='$id_User']")[0];
        $owned_flr_id = 0;

        if ($flr != null) {
            $owned_flr_id = $flr->getAttribute('id');
            echo '<option value="' . $flr->getAttribute('id') . '">' . '(votre filiere) ' . $flr->getElementsByTagName('name')[0]->nodeValue . '</option>';
        }

        foreach ($filiereElements as $flr) {
            if ($flr->getAttribute('id') != $owned_flr_id) {
                echo '<option value="' . $flr->getAttribute('id') . '">' . $flr->getElementsByTagName('name')[0]->nodeValue . '</option>';
            }
        }
    }


    ?>


    <body>
        <center>
            <h2>Modifier un <?php echo $userRoleName->nodeValue; ?></h2>
        </center>
        <link href="../siteWeb/css/style.min.css" rel="stylesheet">
        <link href="../siteWeb/myCSS/calender.css" rel="stylesheet">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row middle">
                <!-- Column -->

                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-12 submiddle">
                    <div class="card">
                        <div class="card-body">
                            <!--the add form : un form pour ajouter un utilisateur : -->
                            <form class="form-horizontal form-material addForm" method="POST">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Nom</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" class="form-control p-0 border-0" placeholder="Nom" value="<?= $user_name ?>" name="name" />
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Prenom</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" class="form-control p-0 border-0" placeholder="Prenom" value="<?= $user_prenom ?>" name="first-name" />
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="example-email" class="col-md-12 p-0">Pseudo nom</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="Nom-ests" class="form-control p-0 border-0" name="pseudo" value="<?= $user_pseudo ?>" id="psd" />
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Téléphone</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="06++++++++" class="form-control p-0 border-0" name="phone" id="psd" value="<?= $user_phone ?>" pattern="[0][6-7][0-9]{8}" />
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Mot de passe</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="password" placeholder="Entrez le mot de passe" value="<?= $user_password ?>" class="form-control p-0 border-0" />
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Selectionner le rôle</label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="roleId">
                                            <?php

                                            $roles = $xpath->query("//roles/role");
                                            echo ' <option value="' . $roleID . '">' . $userRoleName->nodeValue . '</option>';
                                            foreach ($roles as $role) {
                                                if ($role->nodeValue != $userRoleName->nodeValue && $role->nodeValue != "Super Admin") {
                                                    echo ' <option value="' . $role->getAttribute('id') . '">' . $role->nodeValue . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" id="mod" class="btn btn-success" onclick="test();" name="mdf-user">
                                            Modifier
                                        </button>
                                        <a href="./usersLists/dynamic-list.php?roleId=<?php echo $roleID; ?>" class="cancel"><button type="button" class="btn btn-secondary">
                                                Annuler
                                            </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
            if ($('select[name="roleId"]').val() == '2') {
                // Remove the additional select if it exists
                $('select[name="additionalSelect"]').parent().parent().remove();
                // Append your new select here
                $('.form-group.mb-4:last').before('<div class="form-group mb-4"><label class="col-sm-12">Selectionner le département</label><div class="col-sm-12 border-bottom"><select class="form-select shadow-none p-0 border-0 form-control-line" name="additionalSelect"><?php departmentsM(); ?></select></div></div>');
            } else if ($('select[name="roleId"]').val() == '3') {
                // Remove the additional select if it exists
                $('select[name="additionalSelect"]').parent().parent().remove();
                // Append your new select here
                $('.form-group.mb-4:last').before('<div class="form-group mb-4"><label class="col-sm-12">Selectionner la filiere</label><div class="col-sm-12 border-bottom"><select class="form-select shadow-none p-0 border-0 form-control-line" name="additionalSelect"><?php filieresM(); ?></select></div></div>');
            } else {
                // Remove the additional select if it exists
                $('select[name="additionalSelect"]').parent().parent().remove();
            }
            $(function() {
                $('select[name="roleId"]').change(function() {
                    if ($(this).val() == '2') {
                        // Remove the additional select if it exists
                        $('select[name="additionalSelect"]').parent().parent().remove();
                        // Append your new select here
                        $('.form-group.mb-4:last').before('<div class="form-group mb-4"><label class="col-sm-12">Selectionner le département</label><div class="col-sm-12 border-bottom"><select class="form-select shadow-none p-0 border-0 form-control-line" name="additionalSelect"><?php departmentsM(); ?></select></div></div>');
                    } else if ($(this).val() == '3') {
                        // Remove the additional select if it exists
                        $('select[name="additionalSelect"]').parent().parent().remove();
                        // Append your new select here
                        $('.form-group.mb-4:last').before('<div class="form-group mb-4"><label class="col-sm-12">Selectionner la filiere</label><div class="col-sm-12 border-bottom"><select class="form-select shadow-none p-0 border-0 form-control-line" name="additionalSelect"><?php filieresM(); ?></select></div></div>');
                    } else {
                        // Remove the additional select if it exists
                        $('select[name="additionalSelect"]').parent().parent().remove();
                    }
                });
            });
        </script>
        <style>
            .cancel {

                margin-left: 85% !important;
            }

            .cancel button {
                color: white !important;
            }

            .middle .submiddle {
                margin: 0 auto !important;
            }

            .submiddle {
                width: 98% !important;
            }
        </style>

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
    <style>
        form input,
        form select {
            font-weight: bolder !important;
        }
    </style>
<?php

} else {
    header('location: ../logOut.php');
}




?>