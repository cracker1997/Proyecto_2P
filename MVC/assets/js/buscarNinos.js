document.addEventListener('DOMContentLoaded', () => {
    const inputBusqueda = document.getElementById('input-busqueda');
    const cuerpoTabla = document.getElementById('tabla-ninos');

    inputBusqueda.addEventListener('input', () => {
        const nombre = inputBusqueda.value.trim();

        fetch(`index.php?c=Ninos&a=buscarAjax&nombre=${encodeURIComponent(nombre)}`)
        .then(res => res.json())
        .then(data => {
            cuerpoTabla.innerHTML = '';

            if (data.length === 0) {
            cuerpoTabla.innerHTML = '<tr><td colspan="8">No se encontraron resultados</td></tr>';
            return;
            }

            data.forEach(nino => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${nino.nombre}</td>
                <td>${nino.apellido}</td>
                <td>${nino.fecha_nacimiento}</td>
                <td>${nino.genero}</td>
                <td>${nino.nivel}</td>
                <td>${nino.tutor}</td>
                <td>${nino.alergias == 1 ? 'Sí: ' + nino.detalle_alergias : 'No'}</td>
                <td>
                <a href="index.php?c=Ninos&a=editar&id=${nino.id}">Editar</a> |
                <a href="index.php?c=Ninos&a=eliminar&id=${nino.id}" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                </td>
            `;
            cuerpoTabla.appendChild(fila);
            });
        })
        .catch(err => {
            console.error('Error en la búsqueda:', err);
        });
    });
});
