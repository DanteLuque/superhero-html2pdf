<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

  <div class="container mt-3">

    <!-- filtrar por editoras-->
    <form method="POST" action="<?= base_url('reportes/show-heroes') ?>">
      <h4>Filtrar por editorias</h4>
      <div class=" input-group">
        <div class="form-floating">
          <select name="publisher_id" id="publisher_id" class="form-select">
            <option value="">Seleccione</option>
            <?php foreach ($publishers as $publisher): ?>
              <option value=<?= $publisher['id'] ?>>
                <?= $publisher['publisher_name'] ?>
              </option>
            <?php endforeach; ?>
          </select>
          <label for="publisher_id">Editora para generar</label>
        </div>
        <button type="submit" class="btn btn-success">Generar</button>
      </div>
    </form>

    <!-- filtrar por razas y alineaciones (bando)-->
    <form method="POST" action="<?= base_url('reportes/show-heroes-and-race-align') ?>">
      <h4>Filtrar por razas y alineamiento</h4>
      <div class=" input-group">
        <div class="form-floating">
          <select name="race_id" id="race_id" class="form-select">
            <option value="">Seleccione</option>
            <?php foreach ($razas as $raza): ?>
              <option value=<?= $raza['id'] ?>>
                <?= $raza['race'] ?>
              </option>
            <?php endforeach; ?>
          </select>
          <label for="race_id">Razas</label>
        </div>

        <div class="form-floating ms-2">
          <select name="alignment_id" id="alignment_id" class="form-select">
            <option value="">Seleccione</option>
            <?php foreach ($alineamientos as $alineamiento): ?>
              <option value=<?= $alineamiento['id'] ?>>
                <?= $alineamiento['alignment'] ?>
              </option>
            <?php endforeach; ?>
          </select>
          <label for="alignment_id">Alineamiento</label>
        </div>
        <button type="submit" class="btn btn-success">Generar</button>
      </div>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>