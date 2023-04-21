  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Index</title>
  </head>

  <body>
      <?php
        session_start();
        //   include('auth/functions.php');
        $doc = new DOMDocument();
        $doc->load('auth/xml1.xml');
        $xpath = new DOMXPath($doc);

        if (isset($_POST['loginbtn'])) {
            $pseudo = $_POST['login_pseudo'];
            $mdb = $_POST['mdp'];
            $user = $xpath->query("//user[pseudo='" . $pseudo . "' and password='" . $mdb . "']");
            if ($user->length > 0) {
                $node = $user->item(0);
                $roleID = $xpath->query("roleID", $node)->item(0)->textContent;
                $firstName = $xpath->query("first-name", $node)->item(0)->textContent;
                $name = $xpath->query("name", $node)->item(0)->textContent;
                $_SESSION['roleID'] = $roleID;
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['first-name'] = $firstName;
                $_SESSION['name'] = $name;
                // <role id="1">Agent de scolarité</role>
                //     <role id="2">Chef département</role>
                //     <role id="3">Chef filière</role>
                //     <role id="4">Professeur</role>
                //     <role id="5">Super Admin</role>
                switch ($roleID) {
                    case 1:
                        header('location: siteWeb/agentS.php');
                        break;
                    case 2:
                        header('location: siteWeb/#.php');
                        break;
                    case 3:
                        header('location: siteWeb/#.php');
                        break;
                    case 4:
                        header('location: siteWeb/dashboard.php');
                        break;
                    case 5:
                        header('location: SuperAdmin/dashboard.php');
                        break;
                }
            } else {
                echo '<div id="target" class="alert alert-success indxalert error-Addition" role="alert">
 <p>le pseudo ou le mot de passe est incorrect !!</p>
</div>';
            }
        }
        ?>

      <header>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

      </header>
      <center>
          <div class="navbar">
              <h2 class="h22">Gestion des Absences EST-Safi</h2>
          </div>
      </center>



      <section class="vh-100">
          <div class="container py-5 h-100">
              <div class="row d-flex align-items-center justify-content-center h-100">
                  <div class="col-md-8 col-lg-7 col-xl-6">
                      <img src="auth/img/EST-Safi.png" class="img-fluid" alt="Phone image" />
                  </div>
                  <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                      <form id="formL" method="post" action="">
                          <h1>Login</h1>
                          <!-- Email input -->
                          <div class="form-outline mb-4">
                              <input type="text" id="form1Example13" class="form-control form-control-lg" placeholder="PseudoNom" name="login_pseudo" required />
                              <label class="form-label" for="form1Example13">Login</label>
                          </div>

                          <!-- Password input -->
                          <div class="form-outline mb-4">
                              <input type="password" id="form1Example23" class="form-control form-control-lg" placeholder="Mot de passe" name="mdp" required />
                              <label class="form-label" for="form1Example23">Password</label>
                          </div>



                          <!-- Submit button -->
                          <button type="submit" name="loginbtn" class="btn btn-primary btn-lg btn-block">
                              Sign in
                          </button>


                      </form>
                  </div>
              </div>
          </div>
      </section>
  </body>
  <style>
      #target:hover {
          cursor: pointer;

      }

      #target {
          opacity: 1;
          transition: opacity 1s;

      }

      #target p {
          margin-top: 5px;
      }


      .divider:after,
      .divider:before {
          content: "";
          flex: 1;
          height: 1px;
          background: #eee;
      }

      body {
          background-color: beige;
          /* background-image: url("./img/back.jpg") !important;*/
          /* background-repeat: no-repeat;*/
          /*  background-size: cover;*/
      }

      .navbar {
          overflow: hidden;
          background-color: #622c00;
          position: fixed;
          /* Set the navbar to fixed position */
          top: 0;
          /* Position the navbar at the top of the page */
          width: 100%;
          /* Full width */
          text-align: center !important;
          margin: auto;
          z-index: 999;
          border-bottom: 2px solid black;

      }

      /* Links inside the navbar */
      .navbar a {
          float: left;
          display: block;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          margin: auto;
      }

      /* Change background on mouse-over */
      .navbar a:hover {
          background: #ddd;
          color: black;
      }

      /* Main content */
      .main {
          margin-top: 30px;
          /* Add a top margin to avoid content overlay */
      }

      .h22 {
          margin: 6px auto;
          color: whitesmoke;
      }

      form {
          background-color: white;
          padding: 30px;
          box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
          width: 600px;
          height: 450px;
          padding-top: 5px;
          border: 3px solid #984807;
          border-radius: 15px;
      }

      .innerForm {
          /*   background-color: red ; */
          margin-top: 6%;
      }

      .offset-xl-1 {
          margin-left: 0 !important;

      }

      form input {
          margin-top: 50px !important;
      }

      .tit {
          margin-bottom: 60px;
          text-align: center !important;
      }
  </style>

  </html>
  <script>
      var div = document.getElementById('target');

      setTimeout(function() {
          div.style.opacity = 0;
      }, 1700);

      //prevent the form from resubmission*******
      if (window.history.replaceState) {
          window.history.replaceState(null, null, window.location.href);
      }
      // Get the div element
      var divElement = document.querySelector('#target');

      // Add a click event listener
      divElement.addEventListener('click', function() {
          // Hide the div element
          divElement.style.display = 'none';
      });
  </script>
  <style>
      .cancel {
          margin-left: 74% !important;
      }
  </style>
  <style>
      /* the button to close the error alert */
      .close_alert:hover {
          cursor: pointer;

      }

      .alert-success {
          left: 38%;
          top: 10%;
          width: fit-content;
          position: fixed;
          z-index: 99999;
          font-size: 110%;
          height: 70px;
      }




      .error-Addition {
          color: #6a0c0c;
          background-color: #ff7c7c;
          border-color: #d7f0c9;

      }
  </style>