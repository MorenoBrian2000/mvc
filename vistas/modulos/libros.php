<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Lista de Libros</h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal" data-target="#modalAgregarUsuario">
            <i class="mdi mdi-plus-circle"></i> Agregar Libros </button>
    </div>
</div>
<!--  -->

<div class="modal fade in" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
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
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAgregarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarUsuarioLabel">Agregar Libros</h5>
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
                <button type="button" class="btn btn-success" id="crear-libro">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<script src="vistas/js/libros.js"></script>