<!--MODAL AGREGAR EVENTO-->
<!--
<div class="modal fade" id="horas" style="color:black;">

    <div class="modal-dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <section>
            <input type="time">
        </section>
    </div>

</div>
-->
<!--MODAL AGREGAR EVENTO-->
<div class="modal fade" id="horas" style="color:black;">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Hora</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!--<form enctype="multipart/form-data" name="formulario" id="formularioAgregarEvento">
                    <input type="time">
                </form>-->
                <input type="hidden" id="modificarFecha" value="">
                <input type="hidden" id="modificarEvento" value="">
                <input type="hidden" id="modificarTr" value="">
                <input type="hidden" id="posicion" value=""> 
                <input id="modificarHora" value="" type="time"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-success modificar_Horario" data-dismiss="modal"> Aceptar</button>
            </div>
        </div>
    </div>
</div>