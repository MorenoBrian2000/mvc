class LibrosExternos {

    static async getLibros(search) {
        let data = new FormData();
        data.append('action', 'searchLibro');
        data.append('filter', search);
        let consulta = await fetch('ApiService/LibrosCentralizados.php', {
            method: 'POST', body: data
        });
        let response = await consulta.json();
        let templete = ``;

        response.map(libro => {
            templete += `<tr>
            <td>${libro.libro_nombre}</td>
            <td>${libro.nombre_universidad}</td>
            <td>
                <button class='badge badge-success badge-sm' onclick="LibrosExternos.showLibro('${libro.universidad_id}' , '${libro.universidad_libro_id}')" > <i class="fa fa-eye"></i> Ver Detalles</button>
            </td>
        </tr>`;
        });
        document.getElementById('tbody-libro').innerHTML = templete;

    }

    static async addLibro() {
        let data = new FormData();
        data.append('action', 'add_book');
        data.append('id', '1000');
        data.append('nombre', 'ubermensch');
        data.append('tema', 'En la filosofía de Friedrich Nietzsche, es una persona que ha alcanzado un estado de madurez espiritual y moral superior al que considera el del hombre común.');
        let consulta = await fetch('ApiService/LibrosCentralizados.php', {
            method: 'POST', body: data
        });
        let response = await consulta.json();
        console.log(response)
    };

    static async showLibro(idUniversidad, idLibro) {
        let data = new FormData();
        data.append('idUniversidad', idUniversidad);
        data.append('idLibro', idLibro);
        data.append('action', 'get_book');

        let consulta = await fetch('ApiService/LibrosCentralizados.php', {
            method: 'POST', body: data
        });
        let response = await consulta.json();
        var base64 = response.libro_base64;

        const blob = base64ToBlob( base64, 'application/pdf' );
        const url = URL.createObjectURL( blob );

        function base64ToBlob( base64, type = "application/octet-stream" ) {
            const binStr = atob( base64 );
            const len = binStr.length;
            const arr = new Uint8Array(len);
            for (let i = 0; i < len; i++) {
                arr[ i ] = binStr.charCodeAt( i );
            }
            return new Blob( [ arr ], { type: type } );
        }

        document.getElementById('redenderPDF').innerHTML = `<iframe width='100%' height='750px' src='${url}'></iframe>`
        $("#show_libro").modal('show')

    }
}

document.getElementById('buscar-libro').addEventListener('keyup', () => {
    let search = document.getElementById('buscar-libro').value;
    LibrosExternos.getLibros(search);
})
