<page backtop="7mm" backbottom="7mm">
    <page_header>
        <?= esc($titulo) ?> - Página [[page_cu]]/[[page_nb]]
    </page_header>

    <page_footer>
        Lista de superheroes
    </page_footer>

    <?= $estilos ?>
    <table class="tabla mt-2">
        <colgroup>
            <col style="width:5%;">
            <col style="width:35%;">
            <col style="width:35%;">
            <col style="width:25%;">
        </colgroup>
        <thead>
            <tr class="bg-primary text-light">
                <th>ID</th>
                <th>nombre</th>
                <th>alias</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['superhero_name'] ?></td>
                    <td><?= $row['full_name'] ?></td>
                    <td><?= $row['gender'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</page>