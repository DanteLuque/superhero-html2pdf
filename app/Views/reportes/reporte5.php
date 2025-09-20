<page backtop="7mm" backbottom="7mm">
 
   <h1>Poderes de <?= $super_hero_name?> (<?=$full_name?>)</h1>
      <ul style="font-size: 30px;">
        <?php foreach ($rows as $row): ?>
          <li>
            <?= $row['power_name'] ?>
          </li>
        <?php endforeach; ?>
      </ul>
</page>