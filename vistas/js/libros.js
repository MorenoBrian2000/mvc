class Libro {

    async getLibros() {
        let data = new FormData();
        document.getElementById('tbody-libro').innerHTML = ``;
        data.append('action', 'getLibros');
        let consulta = await fetch('controller/libro.controller.php', {
            method: 'POST',
            body: data
        })
        let templete = ``;
        let response = await consulta.json();
        response.map(libro => {
            templete += `<tr>
                <td>${libro.id_libro}</td>
                <td>${libro.nombre}</td>
                <td>${libro.descripcion}</td>
                <td>${libro.tema}</td>
                <td>
                    <button class='badge badge-primary badge-sm'   onclick="traerUsaurio(${libro.id_user})"> <i class="fa fa-pencil"></i> Editar</button>
                    <button class='badge badge-danger badge-sm' btn-sm'  onclick="deleteUsuario(${libro.id_user})"> <i class="fa fa-trash"></i> Elimiar</button>
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
        objLibro.getLibros();
    }

}


let objLibro = new Libro();
objLibro.getLibros();

document.getElementById('crear-libro').addEventListener('click', objLibro.addLibro);