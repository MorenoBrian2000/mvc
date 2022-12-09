

let btn_login = document.getElementById('btn_login');
btn_login.addEventListener('click', (e) => {
    e.preventDefault();
    let username_user = $("#InputUsername1").val(),
        password_user = $("#InputPassword1").val();
    if (username_user.length == 0 && password_user.length == 0) {
        alertify.error("Ingresa todos los campos");
    } else {
        let _data = { username_user, password_user, action: 'loginUser' };
        $.post("controller/usuarios.controlador.php", _data, function (data) {
            let resultado = JSON.parse(data);
            if (resultado.response) {
                window.location = 'LibrosApi';
            } else {
                alertify.error(resultado.menssage);
            }
        });
    }
});