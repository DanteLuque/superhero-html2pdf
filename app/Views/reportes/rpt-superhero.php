<h2>Reporte personalizado</h2>

<?= $estilos ?>
  <table class="tabla mt-2">
    <colgroup>
      <col style="width:5%;">
      <col style="width:25%;">
      <col style="width:30%;">
      <col style="width:20%;">
      <col style="width:20%;">
    </colgroup>
    <thead>
      <tr class="bg-primary text-light">
        <th>ID</th>
        <th>nombre</th>
        <th>alias</th>
        <th>Bando</th>
        <th>publisher</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($superheros as $superhero): ?>
        <tr>
          <td><?= $superhero['id'] ?></td>
          <td><?= $superhero['superhero_name'] ?></td>
          <td><?= $superhero['full_name'] ?></td>
          <td><?= $superhero['alignment'] ?></td>
          <td><?= $superhero['publisher_name'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>