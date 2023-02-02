<h1>Page Livre 📔</h1>

<?php foreach ($livre as $value) : ?>
  <p>
    <?= $value['auteur']; ?> - <?= $value['titre']; ?>
    <br>
  </p>
<?php endforeach; ?>