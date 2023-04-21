  <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark w-100">
          <div class="navbar-header" data-logobg="skin6">
              <!-- ============================================================== -->
              <!-- Logo -->
              <!-- ============================================================== -->
              <a class="navbar-brand" href="./dashboard.php">
                  <!-- Logo icon -->
                  <b class="logo-icon">
                      <!-- Dark Logo icon -->
                      <img src="./img/ecampus.png" width="200px" alt="homepage" />
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


                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
                  <li>
                      <a class="profile-pic" href="./dashboard.php">
                          <img src="./img/profile.png" alt="user-img" width="40" height="38" class="img-circle"><span class="text-white font-medium">
                              <?php $i = 0; ?>
                              <?php
                                echo $_SESSION['first-name'] . ' ' . $_SESSION['name'];
                                ?>
                          </span></a>
                      <a id="lgb" href="../logOut.php"> <button type="button" class="btn btn-danger logout-btn">Déconnecter</button></a>
                  </li>

                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
              </ul>
          </div>
      </nav>
  </header>
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
                          <span class="hide-menu active" id="Dashboard">Dashboard</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ajouter-utilisateur.php" aria-expanded="false">
                          <i class=" fas fa-user-plus" aria-hidden="true"></i>
                          <span class="hide-menu">Ajouter utilisateur</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false">
                          <i class="fa fa-user" aria-hidden="true"></i>
                          <span class="hide-menu">Profile</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php?roleId=1" aria-expanded="false">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <span class="hide-menu">Les Agents de scolarité</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php?roleId=2" aria-expanded="false">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <span class="hide-menu">Les Chefs département</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php?roleId=3" aria-expanded="false">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <span class="hide-menu">Les Chefs des filières</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php?roleId=4" aria-expanded="false">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <span class="hide-menu">Les professeurs</span>
                      </a>
                  </li>


                  <!-- onclick="onLoad()" -->
                  <div class="lang">
                      <select name="listlanguages" onchange="langSelectChange(this)">
                          <option value="en" id="en">en</option>
                          <option value="de" id="de">de</option>
                      </select>
                      <style>
                          .lang {
                              border: .6px solid black;
                              width: fit-content;
                              margin: 8px;
                              margin-left: 22px;
                              border-radius: 2px;
                          }
                      </style>
                  </div>


              </ul>

          </nav>
          <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
  </aside>
  <style>
      .sidebar-link.active {
          background-color: rgba(0, 0, 0, 0.2) !important;
      }

      .logout-btn {
          margin-right: 15px !important;
          margin-left: 18px !important;
          color: white;
      }
  </style>