 <!-- XML manipulation :  -->
 <?php
  session_start();
  if (isset($_SESSION['pseudo'])) {
    include('./includes/functions.php');
    if (isset($_POST['add-user'])) {
      //if the super admin has submitted the form in order to add a new user the addUser() will be invoked.
      addUser();
    }
    if (isset($_SESSION['userAdded'])) {
      if ($_SESSION['userAdded'] == true)
        echo '<div class="alert alert-success indxalert" id="target" role="alert">
 Le nouvel utilisateur a été créé avec succès. <img width="22" class="close_alert" src="./img/valid.png" alt="" onclick="hide()">
</div>';
      else
        echo '<div class="alert alert-success indxalert error-Addition" id="target" role="alert">
 Une error est produite durant la création !!!. <img width="22" class="close_alert" src="./img/not.png" alt="" onclick="hide()">
</div>';
      unset($_SESSION['userAdded']);
    }
    include "includes/head.php";
  ?>

   <!-- end XML manipulation -->

   <body>
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
       <!-- ============================================================== -->
       <!-- End Left Sidebar - style you can find in sidebar.scss  -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- Page wrapper  -->
       <!-- ============================================================== -->
       <div class="page-wrapper">
         <!-- ============================================================== -->
         <!-- Bread crumb and right sidebar toggle -->
         <!-- ============================================================== -->
         <div class="page-breadcrumb bg-white">
           <div class="row align-items-center">
             <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
               <h4 class="page-title"><i class="fas fa-address-card"></i>&nbsp;&nbsp;Ajouter un utilisateur :</h4>
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
         <!-- End Bread crumb and right sidebar toggle -->
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
                         <input type="text" class="form-control p-0 border-0" placeholder="Nom" name="name" />
                       </div>
                     </div>
                     <div class="form-group mb-4">
                       <label class="col-md-12 p-0">Prenom</label>
                       <div class="col-md-12 border-bottom p-0">
                         <input type="text" class="form-control p-0 border-0" placeholder="Prenom" name="first-name" />
                       </div>
                     </div>
                     <div class="form-group mb-4">
                       <label for="example-email" class="col-md-12 p-0">Pseudo nom</label>
                       <div class="col-md-12 border-bottom p-0">
                         <input type="text" placeholder="Nom-ests" class="form-control p-0 border-0" name="pseudo" id="psd" />
                       </div>
                     </div>
                     <div class="form-group mb-4">
                       <label for="example-email" class="col-md-12 p-0">Téléphone</label>
                       <div class="col-md-12 border-bottom p-0">
                         <input type="text" placeholder="06++++++++" class="form-control p-0 border-0" name="phone" id="psd" pattern="[0][6-7][0-9]{8}" />
                       </div>
                     </div>
                     <div class="form-group mb-4">
                       <label class="col-md-12 p-0">Mot de passe</label>
                       <div class="col-md-12 border-bottom p-0">
                         <input type="text" name="password" placeholder="Entrez le mot de passe" class="form-control p-0 border-0" />
                       </div>
                     </div>

                     <div class="form-group mb-4">
                       <label class="col-sm-12">Selectionner le rôle</label>

                       <div class="col-sm-12 border-bottom">
                         <select class="form-select shadow-none p-0 border-0 form-control-line" name="roleId">
                           <option value="1">
                             Agent de scolarité
                           </option>
                           <option value="2">
                             Chef département
                           </option>
                           <option value="3">Chef filière</option>
                           <option value="4">Professeur</option>
                         </select>
                       </div>
                     </div>
                     <div class="form-group mb-4">
                       <div class="col-sm-12">
                         <button type="submit" class="btn btn-success" name="add-user">
                           Ajouter
                         </button>
                       </div>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
             <!-- Column -->
           </div>
         </div>
         <!-- improvememtnt -->

         <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
         <script>
           $(function() {
             $('select[name="roleId"]').change(function() {
               if ($(this).val() == '2') {
                 // Remove the additional select if it exists
                 $('select[name="additionalSelect"]').parent().parent().remove();
                 // Append your new select here
                 $('.form-group.mb-4:last').before('<div class="form-group mb-4"><label class="col-sm-12">Selectionner le département</label><div class="col-sm-12 border-bottom"><select class="form-select shadow-none p-0 border-0 form-control-line" name="additionalSelect"><?php departments(); ?></select></div></div>');
               } else if ($(this).val() == '3') {
                 // Remove the additional select if it exists
                 $('select[name="additionalSelect"]').parent().parent().remove();
                 // Append your new select here
                 $('.form-group.mb-4:last').before('<div class="form-group mb-4"><label class="col-sm-12">Selectionner la filiere</label><div class="col-sm-12 border-bottom"><select class="form-select shadow-none p-0 border-0 form-control-line" name="additionalSelect"><?php filieres(); ?></select></div></div>');
               } else {
                 // Remove the additional select if it exists
                 $('select[name="additionalSelect"]').parent().parent().remove();
               }
             });
           });
         </script>
         <script>
           const addFormInputs = document.querySelectorAll('.addForm input');
           addFormInputs.forEach(input => input.setAttribute('required', ''));
         </script>
         <style>
           .middle .submiddle {
             margin: 0 auto !important;
           }
         </style>


         <footer class="footer text-center">
           2022 © ESTS. LP-ISIR
           <a href="http://www.ests.uca.ma/">official site</a>
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
   <style>
     /* the button to close the error alert */
     .close_alert:hover {
       cursor: pointer;

     }

     .alert-success {
       left: 50%;
       top: 64px;
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
 <?php

  } else {
    header('location: ../logOut.php');
  }




  ?>