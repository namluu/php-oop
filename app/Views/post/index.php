<?php $title = 'Post' ?>

<?php ob_start() ?>
<main class="container">
    <div class="bg-body-tertiary p-5 rounded my-3">
        <h1>Posts</h1>
        <a class="btn btn-lg btn-primary" href="<?= ROOT_URL ?>post/create" role="button">Create post »</a>
    </div>

    <?php foreach($posts as $post): ?>
        <div class="bg-body-tertiary p-3 rounded my-3">
            <h3><?= htmlspecialchars($post->title) ?></h3>
            <p><?= htmlspecialchars($post->content) ?></p>
            <p class="d-block text-gray-dark">@<?= $post->user_name ?: 'username' ?></p>
            <p><a class="link-info" href="<?= $post->link ?>" role="button">Link »</a></p>
        </div>
    <?php endforeach ?>
</main>
<?php $content = ob_get_clean() ?>
