<!--Contenedor Superior-->
<div Class = "contenedorSuperior">
    <div class="container">
        <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
            <a class="logo" href="Menu_Principal_Administrador"><img src = "Img/logo.png"/></a>
            <ul class="nav navbar-nav sf-menu">
                <!--li class="active"><a href="#">Home</a></li-->
                <!--Menu Catalago-->
                <!--img class="logo" src = "Img/logo.png"/-->
                <li class="dropdown">
                    <a href="Menu_Principal_Administrador" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-folder-open" aria-hidden="true"></i> &nbsp;Catalago</a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="Atracciones" id="button"><span>Atracciones</span></a></li>
                            <li><a href="Lotes" id="button"><span>Lotes</span></a></li>
                            <!--li><a href="Asociados" id="button"><span>Asociados</span></a></li-->
                            <li><a href="Eventos" id="button"><span>Eventos</span></a></li>
                            <li><a href="Promociones" id="button"><span>Promociones</span></a></li>
                            <li><a href="Usuarios" id="button"><span>Usuarios</span></a></li>
                            <li><a href="Clientes" id="button"><span>Clientes</span></a></li>
                            <li><a href="Contratos" id="button"><span>Contratos y Polizas</span></a></li>
                        </ul>  
                </li>
                <!--Menu Reportes-->
                
                <li class="dropdown">
                    <a href="" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-signal" aria-hidden="true"></i>&nbsp;Reportes</a>
                        <ul class="dropdown-submenu" id = "subMenuReportes">
                            <li><a href="Ingresos x Evento" id="button"><span>Ingresos por evento</span></a></li>
                            <li><a href="Utilización por Evento" id="button"><span>Utilización por evento</span></a></li>
                            <li><a href="Utilización por Atracción" id="button"><span>Utilizacion por atracción</span></a></li>
                        </ul>
                </li>
                <!--Menu Taquilla-->
                
                <!--Menu Superivosr-->
                <li><a href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Supervisar</a>
                    <ul class="dropdown-submenu" id="subMenuCatalago">
                        <li><a href="Ver Taquillas" id="button"><!--i class="fa fa-home" aria-hidden="true"></i--><span>Taquillas</span></a></li>
                        <li><a href="Ver Atracciones" id="button"><span>Atracciones</span></a></li>
                        <li><a href="Ver Supervisores" id="button"><span>Supervisores</span></a></li>
                    </ul>
                </li>
                <!--Menu Validacion-->
                <li><a href=""><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Validacion</a>
                    <ul class="dropdown-submenu" id="subMenuCatalago">
                        <li><a href="Reponer Saldo" id="button"><span>Reponer Saldo</span></a></li>
                    </ul>
                </li>
                <!--Menu Seguridad-->
                <li><a href=""><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Seguridad</a></li>
                <li><a href="Roles"><i class="fa fa-random" aria-hidden="true"></i>&nbsp;Rol</a></li>
                
                <li><a href="Archivo"><i class="fa fa-random" aria-hidden="true"></i>&nbsp;Archivos</a></li>

                <li class="dropdown">
                    <a class="navbar-brand" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo session('Usuario');?></a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="CerrarSesion" id="button"><span>Salir</span></a></a></li>
                        </ul>
                </li>
            </ul>
        </nav>
    </div> 
</div>
<!--/Contenedor Superior-->