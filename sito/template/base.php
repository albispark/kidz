
<?php 
$iduser = -1;
if(isUserLoggedIn()){
    $iduser = $_SESSION["IDuser"];
    $templateParams["notificheHeader"] = $dbh->getUnreadMessages($iduser);
}
else{
    $templateParams["notificheHeader"] = [];
}

?>

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
    <title><?php echo $templateParams["titolo"]?></title>
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
                  <li class="p-2">
                     <?php if(isUserLoggedIn()):?>
                        <a href="inbox.php">
                      <?php else: ?>
                        <a href="login.php">
                      <?php endif; ?>
                      <?php if(empty($templateParams["notificheHeader"])):?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-envelope-open" viewBox="0 0 16 16">
                        <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z"/>
                        </svg>
                      <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                      <?php endif; ?>
                    </a>
                  </li>
                  <li class="p-2">
                    <a href="login.php">
                      <?php if(isUserLoggedIn()):?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                      </svg>
                      <?php else: ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"  fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                      </svg> 
                      <?php endif; ?>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                  <?php if(isUserLoggedIn()):?>
                    href="wishlist.php?id=<?php echo $_SESSION["IDuser"]?>"
                    <?php else: ?>
                    href="login.php"
                    <?php endif; ?>>Wishlist</a>
            </li>
            <?php foreach($templateParams["categorie"] as $categoria): ?>
                <li>
                    <hr/>
                    <a href="categorie.php?id=<?php echo $categoria["IDcategoria"];?>"><?php echo $categoria["nome"]?></a>
                </li>
            <?php endforeach;?>
          </ul>
        </nav>
      </div>

      <!-- Top bar -->
      <div class="mynav">
        <nav class="mx-0 navbar-light">
          <ul class="list-unstyled d-flex justify-content-between align-items-center px-0 py-2 m-0">
            <li class="nav-item">
              <button class="openbtn background-blue border-0 px-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
              </button>
            </li>
            <li class="nav-item text-center">
              <a href="index.php">
                <img class="header_img_mobile" src="img/Logo_KIDZ_v2.png" alt="logo KIDZ"/>
              </a>
            </li>
            <li class="nav-item">
              <a
                  <?php if(isUserLoggedIn()):?>
                    href="carrello.php?id=<?php echo $_SESSION["IDuser"]?>"
                    <?php else: ?>
                    href="login.php"
                    <?php endif; ?> title="Cart">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <!--Search bar-->
      <div class="row">
          <div class="col-12 pb-3">
              <div>
                <label class="label_search_bar" for="cerca">cerca</label>
                <form action="ricerca.php" method="GET"> 
                   <input class="search_bar_mobile form-control rounded-pill py-0 border-0" type="search" placeholder="Cerca" id="cerca" aria-label="Cerca" name="cerca" />
                </form>
              </div>
          </div>
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
                      <?php if(empty($templateParams["notificheHeader"])):?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-open" viewBox="0 0 16 16">
                        <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z"/>
                        </svg>
                      <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                      <?php endif; ?>
                      &nbsp; Inbox
                    </a>

                    <!-- Messaggi - TODO -->
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <ul id="notifications_menu" class="list-unstyled">
                      <?php if(isUserLoggedIn()):?>
                        <?php foreach($templateParams["notificheHeader"] as $notif):?>
                          <li class="mb-1">
                            <a class="dropdown-item" href="#">
                              <div class="notifications">
                                <h5 class="m-0"><?php echo $notif["titolo"]?></h5>
                                <p class="text-truncate m-0"><?php echo $notif["messaggio"]?></p>
                              </div>
                            </a>
                            <hr class="my-1"/>
                          </li>
                        <?php endforeach;?>
                          <li class="text-center mt-2 mb-1">
                            <a href="inbox.php" class="text-primary font-weight-bold">VEDI TUTTI</a>
                          </li>
                        <?php else: ?>
                          <li class="text-center mt-2 mb-1">
                            <a href="login.php" class="text-primary font-weight-bold">LOGIN</a>
                          </li>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </li>

                <!-- Header wishlist -->
                <li class="d-flex pr-3">
                  <a class="btn btn-primary border-0 bg-transparent d-flex align-items-center px-2"
                  <?php if(isUserLoggedIn()):?>
                    href="wishlist.php?id=<?php echo $_SESSION["IDuser"]?>"
                    <?php else: ?>
                    href="login.php"
                    <?php endif; ?>
                  role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                      <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                    </svg>
                    &nbsp; Wishlist
                  </a>
                </li>
              </ul>
            </li>

            <!-- Header logo -->
            <li class="text-center">
              <a href="index.php">
                <img class="header_img_desktop" src="img/Logo_KIDZ_v2.png" alt="logo"/>
              </a>
            </li>

            <li>
              <ul class="header_menu d-flex justify-content-end align-items-center p-0 m-0">
                <!-- Header accedi -->
                <li class="d-flex align-items-center">
                  <a class="btn btn-primary border-0 bg-transparent d-flex align-items-center px-2"  <?php isActive("login.php");?> href="login.php" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                      <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                    <?php if(isUserLoggedIn()):?>
                    &nbsp; <?php echo $_SESSION["nome"]; ?>
                    <?php else: ?>
                    &nbsp; Accedi
                    <?php endif; ?>
                  </a>
                </li>
                <!-- Header carrello -->
                <li class="d-flex align-items-center">
                  <a class="btn btn-primary border-0 bg-transparent d-flex align-items-center px-2" <?php if(isUserLoggedIn()):?>
                    href="carrello.php?id=<?php echo $_SESSION["IDuser"]?>"
                    <?php else: ?>
                    href="login.php"
                    <?php endif; ?> role="button">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                    &nbsp; Carrello
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
      </div>

      <!-- Search bar -->
      <div class="row background-blue">
        <div class="col-3"></div>
          <div class="col-6 pb-2">
              <div>
                <label class="label_search_bar" for="cerca_d">cerca</label>
                <form action="ricerca.php" method="GET">
                  <input class="search_bar_desktop form-control rounded-pill py-0 border-0" type="search" id="cerca_d" placeholder="Cerca" aria-label="Cerca" name="cerca"/>
                </form>
              </div>
          </div>
          <div class="col-3"></div>
      </div>

      <!-- Desktop navbar -->
      <div class="row p-0 background-blue">
        <nav class="navbar py-2">
          <ul class="navbar-nav nav_desktop">
          <?php foreach($templateParams["categorie"] as $categoria): ?>
                <li class="nav-item">
                  <a class="nav-item text-white font-weight-bold text-uppercase" href="categorie.php?id=<?php echo $categoria["IDcategoria"];?>"><?php echo $categoria["nome"]?></a>
                </li>
          <?php endforeach;?>
          </ul>
        </nav>
      </div>

    </div>

    <!-- MAIN BODY -->
    <main class="mb-3">
      <?php
      if(isset($templateParams["nome"])){
          require($templateParams["nome"]);
      }
      ?>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto">
      <div class="row col-12 px-0">
        <hr class="hr_footer col-12 m-0 p-0"/>
          <ul class="nav footer-nav py-3 px-3 col-12">
            <li class="col-md-3"></li>
            <li class="col-12 col-md-2 text-md-center p-0 m-0"><a href="#">ORDINI E SPEDIZIONI</a><hr class="mx-1 d-md-none d-block"/></li>
            <li class="col-12 col-md-2 text-md-center p-0 m-0"><a href="#">SERVIZIO CLIENTI</a><hr class=" mx-1 d-md-none d-block"/></li>
            <li class="col-12 col-md-2 text-md-center p-0 m-0"><a href="#">ACCOUNT</a></li>
            <li class="col-md-3"></li>
          </ul>
      </div>
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