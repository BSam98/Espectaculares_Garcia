<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))) {
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>

<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Espectaculares García</title>
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <!--link href = "CSS/eventos_style.css" rel = "stylesheet" type="text/css"-->

        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="../bootstrap/jquery.min.js"></script>
        <script src="../bootstrap/jquery.slim.min.js" crossorigin="anonymous"></script>
        <script src="../bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../bootstrap/jquery.dataTables.min.css"> 
        <link rel="stylesheet" href="../bootstrap/buttons.dataTables.min.css"> 
        <script src="../bootstrap/jquery-3.5.1.js"></script>
        <script src="../bootstrap/jquery.dataTables.min.js"></script>
        <script src="../bootstrap/dataTables.buttons.min.js"></script>
        <script src="../bootstrap/jszip.min.js"></script>
        <script src="../bootstrap/pdfmake.min.js"></script>
        <script src="../bootstrap/vfs_fonts.js"></script>
        <script src="../bootstrap/buttons.html5.min.js"></script>
        <script src="../bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../bootstrap/bootstrap-icons.css">
        <link rel="stylesheet" href="../bootstrap/aos.css" />
        <script src="../bootstrap/aos.js"></script>
        <script src="../bootstrap/sweetalert.min.js"></script>
        <script src="../bootstrap/jquery.easing.min.js"></script>
        <!--link href="../bootstrap/sb-admin-2.min.css" rel="stylesheet"-->
        <script src="../bootstrap/moment-with-locales.min.js"></script>
        <script src="../bootstrap/jquery.loadingModal.js"></script>
        <link rel="stylesheet" href="../bootstrap/jquery.loadingModal.css">
        <!--link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css"-->
        <script src="JS/menu.js"></script>
    </head>
    <body style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;">
        <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
            <a href="Menu_Principal_User"><img src = "Img/logo.png" style="width: 70px; height:7   0px;"/></a>
                <ul class="nav navbar-nav sf-menu">
                <li class="dropdown">
                    <a class="navbar-brand" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['Usuario']?></a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="CerrarSesion" id="button"><span>Salir</span></a></a></li>
                        </ul>
                </li>
            </ul>
        </nav>
        <div class="container-fluid" style="background-color: white;">
            <center><h6>Elige las atracciones a supervisar</h6></center>
            <table>
                <tbody>
                    <tr>
                        <td><label>Zonas</label></td>
                        <?php foreach($Zonas as $z){?>
                            <td><?php echo $z->Nombre?></td>
                        <?php }?>
                    </tr>
                </tbody>
            </table>
            
            
        </div>
        <div class="container-fluid" style="background-color: white; display: none;">
            <center><h2>SUPERVISAR ATRACCIONES</h2></center><hr>
                <a href="#" id="atraccion" class="btn btn-success">
                    <img src="https://fenapo.mx/wp-content/uploads/2019/07/Captura-de-pantalla-2019-07-05-a-las-10.40.36.png" alt="" height="200px" width="250px"><br>
                    Atracción 1 - Carrusel
                </a>
            <br>
        </div>
    </body>
</html>

    <script type="text/javascript">
        $('#atraccion').click(function(){
            swal("Ingresa el número de personas a bordo", {
                content: "input",
            })
            .then((value) => {
                //swal(`You typed: ${value}`);
                swal("Agregado correctamente", {
                    icon: "success",
                });
            });
        });
    </script>

<?php }?>