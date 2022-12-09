<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Lista de Libros</h4>
    </div>
</div>

<!-- Tabla de Libros-->
<label for="">Ingresa el nombre del libro</label>
<input type="text" class="form-control mb-5" id="buscar-libro">

<div class="col-lg-12 p-0 mb-3 ">
    <table id="example" class="table dt-responsive nowrap" width="100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
<!--                <th scope="col">TEMA</th>-->
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody id="tbody-libro">
        </tbody>
    </table>
</div>

<div class="modal fade" id="show_libro" tabindex="-1" role="dialog" aria-labelledby="modalEditarLibroLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLibroLabel">Editar Libros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div id="redenderPDF"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="vistas/js/libros-api.js"></script>