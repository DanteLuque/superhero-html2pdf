<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea5</title>
</head>

<body>

    <form method="POST" action="<?= base_url('/tarea5/buscador') ?>">
        <input type="text" name="superhero_name" required style="border: 1px solid black;">
        <button type="submit">OK</button>
    </form>

    <?= $estilos ?>
    <div style="width: 900px;">
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
                    <th>Casa</th>
                    <th>Bando</th>
                    <th>Super Poderes</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($rows)) : ?>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['superhero_name'] ?></td>
                            <td><?= $row['full_name'] ?></td>
                            <td><?= $row['publisher_name'] ?></td>
                            <td><?= $row['alignment'] ?></td>
                            <td>
                                <a href="<?= base_url('/tarea5/poderes/'.$row['id']) ?>" target="_blank">Ver Poderes</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No se han encontrado resultados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>