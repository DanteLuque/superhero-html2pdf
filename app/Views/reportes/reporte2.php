<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte 2</title>
</head>

<body>
  <?= $estilos ?>

  <div class="text-center mb-1">
    <h1>Reporte de ventas</h1>
    <h2>Área <?= $area ?></h2>
  </div>

  <table class="tabla mt-2">
    <colgroup>
      <col style="width:10%;">
      <col style="width:60%;">
      <col style="width:30%;">
    </colgroup>
    <thead>
      <tr class="bg-primary text-light">
        <th>#</th>
        <th>Producto</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($productos as $producto): ?>
        <tr>
          <td><?= $producto['id'] ?></td>
          <td><?= $producto['description'] ?></td>
          <td><?= $producto['precio'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>