<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador</title>
</head>

<body>
  <form method="POST" action="<?= base_url('/reportes/r4') ?>">
    <select name="publisher" id="publisher">
      <?php foreach ($publishers as $publisher): ?>
        <option value="<?= $publisher['publisher_name'] ?>">
          <?=$publisher['publisher_name']?>
        </option>
      <?php endforeach; ?>
    </select>

    <button type="submit">OK</button>
  </form>
</body>

</html>