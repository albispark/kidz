<!doctype html>
<html lang="it">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/functions.js"></script>
    <title><?php echo $templateParams["titoloA"]?></title>
</head>
<body class="container-fluid p-0">

    <!--MOBILE HEADER-->
    <div class="mobile background-blue d-block d-md-none">

      <!--Side bar-->
      <div id="mySidebar" class="sidebar bg-ligth pt-5 m-0 " >
        <nav aria-label="menusecondario">
          <ul class="list-unstyled">
            <li>
              <div class="mt-3">
                <ul class="list-unstyled d-flex align-items-center mb-3">
                  <li class="pl-2 mr-auto">
                    <button type="button" id="focus_btn" class="btn-close border-0 bg-transparent" aria-label="Close">X</button>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
      </div>

      <!-- Top bar -->
      <div class="mynav">
        <nav class="mx-0 navbar-light">
          <ul class="list-unstyled d-flex justify-content-between align-items-center px-0 py-2 m-0">
              
            <li class="nav-item">
                <a href="inbox-admin.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="white" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                  </svg>
                </a>
              </li>
            <li class="nav-item text-center">
              <a href="index-admin.php">
                <img class="header_img_mobile" src="img/Logo_KIDZ_v2.png" alt="logo KIDZ"/>
              </a>
            </li>
            
            <li class="nav-item">
                <a href="login-admin.php">
                  <?php if(isAdminLoggedIn()):?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="white" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                  </svg>
                  <?php else: ?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"  fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                  </svg> 
                  <?php endif; ?>
                </a>
              </li>

          </ul>
        </nav>
      </div>

    </div>


    <!--DESKTOP HEADER-->
    <div class="desktop d-none d-md-block">

      <!--Top bar-->
      <div class="mynav header-blue">
        <nav class="mx-3">
          <ul class="header_ul list-unstyled d-flex justify-content-between align-items-center px-0 py-2 m-0">
            <li>
              <ul class="header_menu d-flex justify-content-start align-items-center p-0 m-0">

                <!-- Header dropdown menu -->
                <li class="d-flex p-0 m-0">

                  <div class="dropdown">
                    <a class="btn btn-primary shadow-none border-0 bg-transparent dropdown-toggle d-flex align-items-center px-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                      </svg>
                      &nbsp; Inbox
                    </a>

                    <!-- Messaggi - TODO -->
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <ul id="notifications_menu" class="list-unstyled">
                        <li class="mb-1">
                          <a class="dropdown-item" href="#">
                            <div class="notifications">
                              <h5 class="m-0">PRODOTTO DISPONIBILE</h5>
                              <p class="text-truncate m-0">Il prodotto "LEGO Star Wars" è tornato disponibile.</p>
                            </div>
                          </a>
                          <hr class="my-1"/>
                        </li>
                        <li class="mb-1">
                          <a class="dropdown-item" href="#">
                            <div class="notifications">
                              <h5 class="m-0">ORDINE SPEDITO</h5>
                              <p class="text-truncate m-0">L'ordine #456694 è stato spedito.</p>
                            </div>
                          </a>
                          <hr class="my-1"/>
                        </li>
                        <li class="mb-1">
                          <a class="dropdown-item" href="#">
                            <div class="notifications">
                              <h5 class="m-0">CODICE SCONTO</h5>
                              <p class="text-truncate m-0">Hai ancora dei prodotti nel tuo carrello! Acquistali con questo codice per ottenere uno sconto del 10% --> SCONTO10</p>
                            </div>
                          </a>
                        </li>
                        <li class="text-center mt-2 mb-1">
                          <a href="inbox.php" class="text-primary font-weight-bold">VEDI TUTTI</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </li>

            <!-- Header logo -->
            <li class="text-center">
              <a href="index-admin.php">
                <img class="header_img_desktop" src="img/Logo_KIDZ_v2.png" alt="logo"/>
              </a>
            </li>

            <li>
              <ul class="header_menu d-flex justify-content-end align-items-center p-0 m-0">
                <!-- Header accedi -->
                <li class="d-flex align-items-center">
                  <a class="btn btn-primary border-0 bg-transparent d-flex align-items-center px-2"  <?php isActive("login-admin.php");?> href="login-admin.php" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                      <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                    <?php if(isAdminLoggedIn()):?>
                    &nbsp; <?php echo $_SESSION["nome"]; ?>
                    <?php else: ?>
                    &nbsp; Accedi
                    <?php endif; ?>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
      </div>

    </div>

    <!-- MAIN BODY -->
    <main class="mb-3">
    <?php
      if(isset($templateParams["nomeA"])){
          require($templateParams["nomeA"]);
      }
      ?>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto">
      <div class="row bg-dark">
        <div class="nav legal-info col-12 pt-4 pb-4 align-content-center">
          <p class="m-0 col-12 text-center">
            <a href="#">Termini e condizioni |</a> <a href="#">Politica dei cookie |</a> <a href="#">Informativa sulla privacy</a>
          </p>
          <p class="text-white m-0 col-12 text-center">© KIDZ tutti i diritti riservati.</p>
        </div>
      </div>
    </footer>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>