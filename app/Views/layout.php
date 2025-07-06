<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= ROOT_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <title><?= $title ?></title>
</head>
<body>
    <nav class="py-2 bg-body-tertiary border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="<?= ROOT_URL ?>" class="nav-link link-body-emphasis px-2">Home</a></li>
                <li class="nav-item"><a href="<?= ROOT_URL ?>post" class="nav-link link-body-emphasis px-2">Posts</a></li>
                <li class="nav-item"><a href="<?= ROOT_URL ?>post/create" class="nav-link link-body-emphasis px-2">Create post</a></li>
            </ul>
            <ul class="nav">
                <?php if (isset($currentUser)): ?>
                    <li class="nav-item"><a href="<?= ROOT_URL ?>user/account" class="nav-link link-body-emphasis px-2">
                            Hello: <?= $currentUser->name ?></a></li>
                <?php else: ?>
                <li class="nav-item"><a href="<?= ROOT_URL ?>user/login" class="nav-link link-body-emphasis px-2">Login</a></li>
                <li class="nav-item"><a href="<?= ROOT_URL ?>user/register" class="nav-link link-body-emphasis px-2">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?php require 'app/Views/messages.php'; ?>
    <?= $content ?>
    <script src="<?= ROOT_URL ?>assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
