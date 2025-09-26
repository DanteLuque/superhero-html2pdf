<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <button id="btn-exportar">Exportar</button>
  <table id="tabla-datos">
    <tr>
      <th>titulo1</th>
      <th>titulo2</th>
      <th>titulo3</th>
      <th>titulo4</th>
      <th>titulo5</th>
    </tr>
    <tr>
      <td>opinion</td>
      <td>cowboy</td>
      <td>deer</td>
      <td>rod</td>
      <td>news</td>
    </tr>
    <tr>
      <td>primitive</td>
      <td>shop</td>
      <td>full</td>
      <td>face</td>
      <td>west</td>
    </tr>
    <tr>
      <td>effort</td>
      <td>helpful</td>
      <td>round</td>
      <td>mental</td>
      <td>breeze</td>
    </tr>
    <tr>
      <td>both</td>
      <td>opinion</td>
      <td>rush</td>
      <td>deep</td>
      <td>window</td>
    </tr>
    <tr>
      <td>map</td>
      <td>each</td>
      <td>triangle</td>
      <td>blue</td>
      <td>none</td>
    </tr>
    <tr>
      <td>art</td>
      <td>kept</td>
      <td>step</td>
      <td>path</td>
      <td>zebra</td>
    </tr>
    <tr>
      <td>attention</td>
      <td>poetry</td>
      <td>spend</td>
      <td>statement</td>
      <td>gone</td>
    </tr>
    <tr>
      <td>shells</td>
      <td>company</td>
      <td>uncle</td>
      <td>pick</td>
      <td>real</td>
    </tr>
    <tr>
      <td>oil</td>
      <td>cow</td>
      <td>property</td>
      <td>cell</td>
      <td>area</td>
    </tr>
    <tr>
      <td>farther</td>
      <td>happily</td>
      <td>instrument</td>
      <td>desk</td>
      <td>carefully</td>
    </tr>
  </table>
</body>

<script type="text/javascript" src="https://cdn.sheetjs.com/xlsx-0.20.3/package/dist/xlsx.full.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    //referencia a la fuente de datos
    const tabla = document.getElementById("tabla-datos");
    const btnExportar = document.getElementById("btn-exportar");
    //Crear un un WorkBook (libro de trabajo o sea un Excel) > Hoja > tabla
    const workBook = new XLSX.utils.table_to_book(tabla, { sheet: 'Datos' });

    btnExportar.addEventListener("click", () => {
      // Construir y habilitar la descarga
      XLSX.writeFile(workBook, "Reporte.xlsx");
    })
  })
</script>

</html>