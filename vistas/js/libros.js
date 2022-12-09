class Libro {

    async getLibros() {
        let data = new FormData();
        document.getElementById('tbody-libro').innerHTML = ``;
        data.append('action', 'getLibros');
        let consulta = await fetch('controller/libro.controller.php?id=null');
        let templete = ``;
        let response = await consulta.json();
        response.map(libro => {
            templete += `<tr>
                <td>${libro.id_libro}</td>
                <td>${libro.nombre}</td>
                <td>${libro.descripcion}</td>
                <td>${libro.tema}</td>
                <td>
                    <button class='badge badge-primary badge-sm'   onclick="Libro.traerLibros(${libro.id_libro})"> <i class="fa fa-pencil"></i> Editar</button>
                    <button class='badge badge-danger badge-sm' btn-sm'  onclick="Libro.deleteLibro(${libro.id_libro})"> <i class="fa fa-trash"></i> Elimiar</button>
                </td>
            </tr>`;
        });

        document.getElementById('tbody-libro').innerHTML = templete;

    }

    async addLibro() {
        let data = new FormData();
        data.append('nombre', document.getElementById('txt_nombre').value);
        data.append('descripcion', document.getElementById('txt_descripcion').value);
        data.append('tema', document.getElementById('txt_tema').value);
        data.append('action', 'addLibro');
        let consulta = await fetch('controller/libro.controller.php', {
            method: 'POST',
            body: data
        })
        let response = await consulta.json();
        let objLibro = new Libro();
        $("#modalAgregarLibro").modal('hide');
        objLibro.getLibros();
    }

    static deleteLibro = (id_libro) => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                let response = await fetch(`controller/libro.controller.php?id=${id_libro}`, {
                    method: 'DELETE'
                });
                let data = await response.json();
                if (data.success == "ok") {
                    Swal.fire('Success!', 'Usaurio eliminado con exito!', 'success');
                    location.reload();
                } else {
                    Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
                }

            }
        })

    }

    static traerLibros = async (id) => {
        let response = await fetch(`controller/libro.controller.php?id=${id}`);
        let libro = await response.json();
        document.getElementById('edit_id').value = libro.id_libro;
        document.getElementById('edit_nombre').value = libro.nombre;
        document.getElementById('edit_descripcion').value = libro.descripcion;
        document.getElementById('edit_tema').value = libro.tema;
        $("#modalEditarLibro").modal('show');
    }

    actulizarLibro = async () => {

        let libro = {
            edit_id: document.getElementById('edit_id').value,
            nombre: document.getElementById('edit_nombre').value,
            descripcion: document.getElementById('edit_descripcion').value,
            tema: document.getElementById('edit_tema').value
        }

        let response = await fetch('controller/libro.controller.php', {
            method: 'PUT',
            body: JSON.stringify(libro),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        let data = await response.json();
        if (data.response) {
            Swal.fire('Success!', 'Libro actualizado con exito!', 'success');
            location.reload();
        } else {
            Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
        }

    }

}


let objLibro = new Libro();
objLibro.getLibros();

document.getElementById('crear-libro').addEventListener('click', objLibro.addLibro);
document.getElementById('edit-libro').addEventListener('click', objLibro.actulizarLibro);