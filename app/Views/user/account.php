<?php $title = 'My Account' ?>

<?php ob_start() ?>
<main class="container">
    <div class="bg-body-tertiary p-5 rounded my-3">
        <h1>My Account</h1>
        <p>Hello: <?= $user?->name ?></p>
        <p><a href="<?= ROOT_URL ?>user/logout">Logout</a></p>
    </div>
</main>
<?php $content = ob_get_clean() ?>
