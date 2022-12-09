<!-- partial:partials/_sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item " style="background: #ffffff;">
            <a class="nav-link d-block" href="LibrosApi">
                <img class="sidebar-brand-logo mt-2" src="vistas/assets/images/ipn-logo.png" style="width: 100%;"
                     alt=""/>
                <img class="sidebar-brand-logomini" src="vistas/assets/images/descarga.jpg"
                     style="width: 50px; margin-bottom: -10px;margin-top: 5px;" alt=""/>
            </a>
        </li>
        <li class="pt-2 pb-1">
            <span class="nav-item-head">Modulos</span>
        </li>
        <?php if ($_SESSION["rol_user"] == 1) : ?>

            <li class="nav-item">
                <a class="nav-link" href="usuarios">
                    <img src="vistas/assets/images/icons/1771192.png" class="mr-2 mb-1 iconMenu" width="25" alt="">
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="libros">
                    <img src="vistas/assets/images/icons/5013688.png" class="mr-2 mb-1 iconMenu" width="25" alt="">
                    <span class="menu-title">Biblioteca IPN</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="LibrosApi">
                    <img src="vistas/assets/images/icons/2302865.png" class="mr-2 mb-1 iconMenu" width="25" alt="">
                    <span class="menu-title">Biblioteca Universal</span>
                </a>
            </li>


        <?php endif; ?>
        <?php if ($_SESSION["rol_user"] == 2) : ?>
            <li class="nav-item">
                <a class="nav-link" href="LibrosApi">
                    <img src="vistas/assets/images/icons/2302865.png" class="mr-2 mb-1 iconMenu" width="25" alt="">
                    <span class="menu-title">Biblioteca Digital</span>
                </a>
            </li>

        <?php endif; ?>

    </ul>
</nav>