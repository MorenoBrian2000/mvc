<!-- partial:partials/_sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item " style="background: #ffffff;">
      <a class="nav-link d-block" href="inicio">
        <!-- <img class="sidebar-brand-logo mt-2" src="vistas/assets/images/Imagen1.png" style="width: 100%;" alt="" /> -->
        <!-- <img class="sidebar-brand-logomini" src="vistas/assets/images/Imagen2.png" style="width: 75px; margin-bottom: -10px;margin-top: 5px;" alt="" /> -->
      </a>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Modulos</span>
    </li>
    <?php if ($_SESSION["rol_user"] == 1) : ?>

      <li class="nav-item">
        <a class="nav-link" href="usuarios">
          <i class="fa fa-users  menu-icon"></i>
          <span class="menu-title">Usuarios</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="libros">
          <i class="fa fa-book  menu-icon"></i>
          <span class="menu-title">Libros</span>
        </a>
      </li>



    <?php endif; ?>

    <style>
      .iconMenu:hover {
        width: 30px;
      }
    </style>

  </ul>
</nav>