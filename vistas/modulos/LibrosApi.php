<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Lista de Libros</h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal" data-target="#modalAgregarLibro">
            <i class="mdi mdi-plus-circle"></i> Agregar Libros </button>
    </div>
</div>

<!-- Tabla de Libros-->


<div class="col-lg-12 p-0 mb-3 ">
    <table id="example" class="table dt-responsive nowrap" width="100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">TEMA</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody id="tbody-libro">
        </tbody>
    </table>
</div>



<!-- Modal Agregar Libros -->
<div class="modal fade" id="modalAgregarLibro" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLibroLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarLibroLabel">Agregar Libros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form class="form-sample">
                        <p class="card-description">Completa los campos correctamente</p>
                        <div class="row">
                            <!-- Nombre  -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_user"><b>Nombre</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_nombre" placeholder="Nombre">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="apaterno_user"><b>DESCRIPCION</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_descripcion" placeholder="Apellido Paterno">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="amaterno_user"><b>TEMA</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_tema" placeholder="Apellido Materno">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="addLibro();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Editar Libros -->
<div class="modal fade" id="modalEditarLibro" tabindex="-1" role="dialog" aria-labelledby="modalEditarLibroLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLibroLabel">Editar Libros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form class="form-sample">
                        <p class="card-description">Completa los campos correctamente</p>
                        <div class="row">
                            <!-- Nombre  -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_user"><b>Nombre</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="edit_nombre" placeholder="Nombre">
                                        <input type="hidden" class="form-control" id="edit_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="apaterno_user"><b>DESCRIPCION</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="edit_descripcion" placeholder="Apellido Paterno">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="amaterno_user"><b>TEMA</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="edit_tema" placeholder="Apellido Materno">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="actulizarLibro();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<script src="vistas/js/libros-ext.js"></script>