const getExternalData = async () => {
    let templete = ``;
    document.getElementById('tbody-libro').innerHTML = ``;
    const consulta = await fetch('ApiService/LibrosCentralizadosAppService.php');
    let response = await consulta.json();
    response.map(libro => {
        templete += `<tr>
            <td>${libro.id_libro}</td>
            <td>${libro.nombre}</td>
            <td>${libro.descripcion}</td>
            <td>${libro.tema}</td>
            <td>
                <button class='badge badge-primary badge-sm'   onclick="traerLibros(${libro.id_libro})"> <i class="fa fa-pencil"></i> Editar</button>
                <button class='badge badge-danger badge-sm' btn-sm'  onclick="deleteLibro(${libro.id_libro})"> <i class="fa fa-trash"></i> Elimiar</button>
            </td>
        </tr>`;
    });
    document.getElementById('tbody-libro').innerHTML = templete;
}

async function addLibro() {
    let data = new FormData();
    data.append('nombre', document.getElementById('txt_nombre').value);
    data.append('descripcion', document.getElementById('txt_descripcion').value);
    data.append('tema', document.getElementById('txt_tema').value);
    data.append('action', 'addLibro');
    let consulta = await fetch('ApiService/LibrosCentralizadosAppService.php', {
        method: 'POST',
        body: data
    })
    let response = await consulta.json();
    let objLibro = new Libro();
    $("#modalAgregarLibro").modal('hide');
    objLibro.getLibros();
}

const traerLibros = async (id) => {
    const consulta = await fetch('ApiService/LibrosCentralizadosAppService.php');
    let libro = await consulta.json();
    libro.filter(function (i, n) {
        if (i.id_libro == id) {
            document.getElementById('edit_id').value = i.id_libro;
            document.getElementById('edit_nombre').value = i.nombre;
            document.getElementById('edit_descripcion').value = i.descripcion;
            document.getElementById('edit_tema').value = i.tema;
            $("#modalEditarLibro").modal('show');
        }
    })

}


const actulizarLibro = async () => {

    let libro = {
        edit_id: document.getElementById('edit_id').value,
        nombre: document.getElementById('edit_nombre').value,
        descripcion: document.getElementById('edit_descripcion').value,
        tema: document.getElementById('edit_tema').value
    }

    let response = await fetch('ApiService/LibrosCentralizadosAppService.php', {
        method: 'PUT',
        body: JSON.stringify(libro),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();
    location.reload();

}



getExternalData();