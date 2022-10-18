const ValidateUser = async (user) => {
    let data = new FormData();
    data.append('action', 'ValidateUser');
    data.append('username', user);
    let query = await fetch('controller/usuarios.controlador.php', {
        method: 'POST',
        body: data
    });

    return await query.json();
}

const crearUsuarios = async () => {

    let Usuario = {
        nombre_user: $("#txt_nombre_user").val(),
        apaterno_user: $("#txt_apaterno_user").val(),
        amaterno_user: $("#txt_amaterno_user").val(),
        correo_user: $("#txt_correo_user").val(),
        domicilio_user: $("#txt_domicilio_user").val(),
        telefono_user: $("#txt_telefono_user").val(),
        username_user: $("#txt_username_user").val(),
        password_user: $("#txt_password_user").val(),
        status_user: "1",
        rol_user: "1"
    }

    ValidateUser($("#txt_username_user").val()).then(async item => {
        if (!item.result) {
            let response = await fetch('api/controller/users', {
                method: 'POST',
                body: JSON.stringify(Usuario),
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            let data = await response.json();

            if (data.response) {
                Swal.fire('Success!', 'Usaurio agregado con exito!', 'success');
                traerUsuariosAll();
                $("#modalAgregarUsuario").modal('hide');
            } else {
                Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
            }
        } else {
            Swal.fire('Error!', 'El nombre se usuario ya se ha registrado!', 'error');

        }
    })


}

const traerUsuariosAll = async () => {
    try {
        let response = await fetch('api/controller/users');
        let usuarios = await response.json();
        let templete = ``;
        for (const usuario of usuarios) {
            templete += `<tr>
                <td>${usuario.id_user}</td>
                <td>${usuario.nombre_user}</td>
                <td>${usuario.amaterno_user}</td>
                <td>${usuario.apaterno_user}</td>
                <td>${usuario.username_user}</td>
                <td>
                    <button class='badge badge-warning badge-sm'  onclick="modificarCredenciales(${usuario.id_user})">Credenciales</button>
                    <button class='badge badge-primary badge-sm'   onclick="traerUsaurio(${usuario.id_user})">Editar</button>
                    <button class='badge badge-danger badge-sm' btn-sm'  onclick="deleteUsuario(${usuario.id_user})">Elimiar</button>
                </td>
            </tr>`;
        }
        document.getElementById('tbody-usuarios').innerHTML = templete;
    } catch (error) {
        console.log(error);
    }
}


const traerUsaurio = async (id_user) => {
    let response = await fetch(`api/controller/users/${id_user}`);
    let usuarios = await response.json();
    console.log(usuarios);
    document.getElementById('id_user').value = usuarios.id_user;
    document.getElementById('nombre_user').value = usuarios.nombre_user;
    document.getElementById('apaterno_user').value = usuarios.apaterno_user;
    document.getElementById('amaterno_user').value = usuarios.amaterno_user;
    document.getElementById('correo_user').value = usuarios.correo_user;
    document.getElementById('domicilio_user').value = usuarios.domicilio_user;
    document.getElementById('telefono_user').value = usuarios.telefono_user;
    $("#modalUpdateUsuario").modal('show');
}

const actulizarUsuario = async () => {


    let usuario = {
        id_user: $("#id_user").val(),
        nombre_user: $("#nombre_user").val(),
        apaterno_user: $("#apaterno_user").val(),
        amaterno_user: $("#amaterno_user").val(),
        correo_user: $("#correo_user").val(),
        domicilio_user: $("#domicilio_user").val(),
        telefono_user: $("#telefono_user").val(),
        rol_user: "1"
    }
    let response = await fetch('api/controller/users', {
        method: 'PUT',
        body: JSON.stringify(usuario),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Usaurio agregado con exito!', 'success');
        reloadDatatable();
        $("#modalAgregarUsuario").modal('hide');
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}



const deleteUsuario = (id_user) => {

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

            let response = await fetch(`api/controller/users/${id_user}`, {
                method: 'DELETE'
            });
            let data = await response.json();
            if (data.response) {
                Swal.fire('Success!', 'Usaurio agregado con exito!', 'success');
                reloadDatatable();
                $("#modalAgregarUsuario").modal('hide');
            } else {
                Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
            }

        }
    })

}




const modificarCredenciales = async id_user => {
    try {

        let response = await fetch(`api/controller/users/${id_user}`);
        let credenciales = await response.json();
        $("#username_user").val(credenciales.username_user);
        $("#id_user_u").val(credenciales.id_user);
        $("#password_old_user").val(credenciales.password_user);
        $("#modalUpdateCredenciales").modal('show');

    } catch (error) {
        console.log(error);
    }
}


const actulizarUsuarioCredenciales = async () => {

    let datos = {
        username_user: $("#username_user").val(),
        password_user: $("#password_user").val(),
        id_user: $("#id_user_u").val(),
        action: 'updateCredenciales',
    }

    console.log(datos);

    $.post("controller/usuarios.controlador.php", datos, function (data) {

        let response = JSON.parse(data);
        if (response.response) {
            Swal.fire('Success!', 'Usaurio actualizado con exito!', 'success');
            reloadDatatable();
            $("#modalAgregarUsuario").modal('hide');
        } else {
            Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
        }
    });

}


traerUsuariosAll();