<section class="container" style="background-color: white;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
    <hr><center><h2>SUPERVISAR ATRACCIONES</h2></center><hr>

    <div class="container-fluid">
        <a href="#" id="atraccion" class="btn btn-success">
            <img src="https://fenapo.mx/wp-content/uploads/2019/07/Captura-de-pantalla-2019-07-05-a-las-10.40.36.png" alt="" height="200px" width="250px"><br>
            Atracción 1 - Carrusel
        </a>
    </div>
    <br>
</section>

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