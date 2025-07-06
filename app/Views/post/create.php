<?php $title = 'Create a Post' ?>

<?php ob_start() ?>
<main class="container">
    <div class="bg-body-tertiary p-5 rounded my-3">
        <h1>Posts</h1>
        <?php if (isset($currentUser)): ?>
        <p class="lead">Let create some posts</p>
        <?php endif; ?>
    </div>
    <form method="post" action="<?= ROOT_URL ?>post/store">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php $content = ob_get_clean() ?>
