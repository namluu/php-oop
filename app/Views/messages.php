<?php if ($message = \Core\Message::getSuccessMessage()) :?>
    <div class="container my-3"><div class="alert alert-success"><?= $message ?></div></div>
<?php endif ?>

<?php if ($message = \Core\Message::getErrorMessage()) :?>
    <div class="container my-3"><div class="alert alert-danger"><?= $message ?></div></div>
<?php endif ?>

