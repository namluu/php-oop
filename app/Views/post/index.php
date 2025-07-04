<?php $title = 'Post' ?>

<?php ob_start() ?>
<main class="container">
    <div class="bg-body-tertiary p-5 rounded my-3">
        <h1>Posts</h1>
        <p class="lead">hello from the index action in Post controller.</p>
    </div>
    <ul>
        <?php foreach($posts as $post): ?>
            <li>
                <h2><?= $post['title'] ?></h2>
                <p><?= $post['content'] ?></p>
            </li>
        <?php endforeach ?>
    </ul>
</main>
<?php $content = ob_get_clean() ?>
