document.addEventListener("DOMContentLoaded", () => {
  // Función para generar la tabla con los datos
  const generarTabla = () => {
    const tabla = document.getElementById("tablaDatos");
    const tbody = tabla.querySelector("tbody");

    // Obtener los filtros
    const filtroTipoProducto = document.getElementById("filtroTipoProducto").value;
    const filtroNombre = document.getElementById("filtroNombre").value.toLowerCase();

    // Obtener todas las filas de la tabla
    const filas = tbody.getElementsByTagName("tr");

    // Recorrer las filas y aplicar los filtros
    for (let i = 0; i < filas.length; i++) {
      const fila = filas[i];
      const nombre = fila.cells[0].textContent.toLowerCase();
      const tipoProducto = fila.cells[1].textContent;

      // Aplicar filtros
      if ((filtroTipoProducto === "" || tipoProducto === filtroTipoProducto) &&
          (nombre.indexOf(filtroNombre) !== -1)) {
        fila.style.display = "";
      } else {
        fila.style.display = "none";
      }
    }
  };

  // Asociar el evento de cambio en los filtros
  const filtros = document.querySelectorAll("#filtroTipoProducto, #filtroNombre");
  filtros.forEach((filtro) => {
    filtro.addEventListener("change", generarTabla);
    filtro.addEventListener("keyup", generarTabla);
  });

  // Generar la tabla inicial
  generarTabla();
});