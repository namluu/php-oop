<?php $title = 'Login User' ?>

<?php ob_start() ?>
<main class="container">
    <div class="bg-body-tertiary p-5 rounded my-3">
        <h1>Login User</h1>
    </div>
    <form method="post" action="<?= ROOT_URL ?>user/auth">
        <div class="mb-3 col-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3 col-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php $content = ob_get_clean() ?>
