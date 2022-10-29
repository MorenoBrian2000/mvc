<?php

session_start();
setlocale(LC_ALL, 'es_MX');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="theme-color">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title> <?php $rute = (isset($_GET["ruta"])) ? $_GET["ruta"] : "INICIO";
          echo strtoupper($rute); ?>
  </title>
  <link rel="stylesheet" href="vistas/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vistas/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vistas/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vistas/assets/vendors/jquery-bar-rating/css-stars.css" />
  <link rel="stylesheet" href="vistas/assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="vistas/assets/css/demo_1/style.css" />
  <script src="vistas/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="vistas/assets/vendors/alertify/sweetalert2@10.js"></script>
  <link rel="stylesheet" href="vistas/assets/vendors/datatable/jquery.dataTables.min.css">

</head>

<body class="">
  <?php
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    echo '<div class="container-scroller">';

    /*=============================================
    MENU
    =============================================*/
    include "modulos/src/_sidebar.php";

    echo '<div class="container-fluid page-body-wrapper" style="width: 100%";>';
    echo '<div class="main-panel"> <div class="content-wrapper pb-0" style="background: white !important;">';


    include "modulos/src/_navbar.php";
    /*=============================================
    CONTENIDO
    =============================================*/

    if (isset($_GET["ruta"])) {

      if (
        $_GET["ruta"] == "login" ||
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "libros" ||
        $_GET["ruta"] == "salir" ||
        $_GET["ruta"] == "LibrosApi"
      ) {

        include "modulos/" . $_GET["ruta"] . ".php";
      } else {

        include "modulos/src/_404.php";
      }
    } else {
    }

    echo '</div>';

    include "modulos/src/_footer.php";

    echo '</div>';
  } else {

    include "modulos/login.php";
  }

  ?>

  <script src="vistas/assets/js/misc.js"></script>


</body>

</html>