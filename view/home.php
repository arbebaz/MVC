<h1>Page Home 🏡</h1>

<?php if(isset($_SESSION['membre'])): ?>

    <p>Hello <?= $_SESSION['membre']['prenom']; ?> 🖤</p>

    <?php endif; ?> 

  