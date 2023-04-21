<?php
session_start();
include('../includes/functions.php');
if (isset($_POST['deleteUser'])) {
    deleteUser($_POST['hd']);
}
if (isset($_SESSION['userDeleted'])) {
    if ($_SESSION['userDeleted'] == true)
        echo '<div class="alert alert-success indxalert" id="target" role="alert">' .
            $_SESSION['roleName'] . ' ' . $_SESSION['userName'] . ' a été supprimé. <img width="22" class="close_alert" src="../img/valid.png" alt="" onclick="hide()">
</div>';
    else
        echo '<div class="alert alert-success indxalert error-Addition" id="target" role="alert">
 Une error est produite durant la suppression !!!. <img width="22" class="close_alert" src="../img/not.png" alt="" onclick="hide()">
</div>';
    unset($_SESSION['userDeleted']);
}

?>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>la liste des utilisateurs:</title>
    <link rel="stylesheet" href="https://unpkg.com/@webpixels/css@1.1.5/dist/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
</head>
<div class="centered">
    <?php displayUser($_GET['roleId']); ?>
</div>

<style>
    .centered .submiddle {
        margin: 0 auto !important;
    }

    #wrapper2 .card {
        border: 1px solid gray;
    }
</style>


<script>
    /* this script to replace the wrapper1 with wrapper2, once the 'modifier' button is clicked */
    /*     function wrapper1_To_wrapper2(id) {
            wrapper1 = document.getElementById('wrapper1');
            wrapper2 = document.getElementById('wrapper2');
            wrapper1.style.display = 'none';
            wrapper2.style.display = 'block';
            var form = wrapper2.querySelector("form");
            form.id = id;

        } */
</script>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûrs de vouloir supprimer définitivement ce compte ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form action="" method="POST">
                    <input type="text" value="" id="id_todel" name="hd" hidden>
                    <button type="submit" class="btn btn-danger" id="" name="deleteUser">Oui</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
    function delete_user(userId) {
        var hiddenInput = document.getElementById('id_todel');
        hiddenInput.value = userId;
    }
</script>

</html>
<style>
    input {
        font-weight: bold !important;
    }

    /* Style the modal overlay */
    .modal-backdrop {
        background-color: transparent;
    }

    .modal-content {
        background-color: #fc5f5ffa !important;
        margin-top: -10px;
    }

    table td {
        font-size: 110% !important;
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



    .container {

        margin: 0 !important;
        max-width: 100% !important;
    }

    .action .delete {
        margin-right: 22px;


    }

    .action {
        text-align: center !important;

    }



    /* .container table {} */
</style>
<script>


</script>

</html>
<style>
    /* the button to close the error alert */
    .close_alert:hover {
        cursor: pointer;

    }

    .alert-success {
        left: 38%;
        top: 2%;
        width: fit-content;
        position: fixed;
        z-index: 99999;

    }

    .error-Addition {
        color: #6a0c0c;
        background-color: #ff7c7c;
        border-color: #d7f0c9;

    }
</style>