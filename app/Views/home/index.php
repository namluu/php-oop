<?php $title = 'Home' ?>

<?php ob_start() ?>
<main class="container">
    <?php if (isset($currentUser)): ?>
    <div class="bg-body-tertiary p-5 rounded my-3">
        <h1>Welcome: <?= $currentUser->name ?></h1>
        <p class="lead">Let create some posts</p>
        <a class="btn btn-lg btn-primary" href="<?= ROOT_URL ?>post/create" role="button">Create post »</a>
    </div>
    <?php endif; ?>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Recent posts</h6>
        <?php foreach($posts as $post): $color = randColor(); ?>
        <div class="d-flex text-body-secondary pt-3">
            <svg aria-label="Placeholder: 32x32" class="bd-placeholder-img flex-shrink-0 me-2 rounded" height="32"
                 preserveAspectRatio="xMidYMid slice" role="img" width="32" xmlns="http://www.w3.org/2000/svg">
                <title>Placeholder</title><rect width="100%" height="100%" fill="<?= $color ?>"></rect>
                <text x="50%" y="50%" fill="<?= $color ?>" dy=".3em">32x32</text>
            </svg>
            <p class="pb-3 mb-0 small lh-sm border-bottom"> <strong class="d-block text-gray-dark">@<?= $post->user_name ?: 'username' ?></strong>
                <?= htmlspecialchars($post->title) ?>
            </p>
        </div>
        <?php endforeach ?>
        <small class="d-block text-end mt-3"> <a href="<?= ROOT_URL ?>post/create">All posts</a> </small>
    </div>
</main>
<?php $content = ob_get_clean() ?>

<?php
function randColor(): string
{
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}
?>