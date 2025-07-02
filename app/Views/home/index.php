<?php $title = 'Home' ?>

<?php ob_start() ?>
<h1>Welcome <?= htmlspecialchars($name) ?></h1>
<p>hello from the index action in Home controller</p>
<?php $content = ob_get_clean() ?>
