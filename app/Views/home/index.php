<?php $title = 'Home' ?>

<?php ob_start() ?>
<main class="container">
    <div class="bg-body-tertiary p-5 rounded my-3">
        <h1>Welcome <?= htmlspecialchars($name) ?></h1>
        <p class="lead">hello from the index action in Home controller.</p>
    </div>
    <div class="bg-body-tertiary p-5 rounded my-3">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how the top-aligned navbar works.
            As you scroll, this navbar remains in its original position and moves with the rest of the page.</p>
        <a class="btn btn-lg btn-primary" href="/docs/5.3/components/navbar" role="button">View navbar docs »</a>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>
        <div class="d-flex text-body-secondary pt-3">
            <svg aria-label="Placeholder: 32x32" class="bd-placeholder-img flex-shrink-0 me-2 rounded" height="32"
                 preserveAspectRatio="xMidYMid slice" role="img" width="32" xmlns="http://www.w3.org/2000/svg">
                <title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect>
                <text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
            </svg>
            <p class="pb-3 mb-0 small lh-sm border-bottom"> <strong class="d-block text-gray-dark">@username</strong>
                Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
            </p>
        </div>
        <div class="d-flex text-body-secondary pt-3">
            <svg aria-label="Placeholder: 32x32" class="bd-placeholder-img flex-shrink-0 me-2 rounded" height="32"
                 preserveAspectRatio="xMidYMid slice" role="img" width="32" xmlns="http://www.w3.org/2000/svg">
                <title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"></rect>
                <text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
            <p class="pb-3 mb-0 small lh-sm border-bottom"> <strong class="d-block text-gray-dark">@username</strong>
                Some more representative placeholder content, related to this other user. Another status update, perhaps.
            </p>
        </div>
        <div class="d-flex text-body-secondary pt-3">
            <svg aria-label="Placeholder: 32x32" class="bd-placeholder-img flex-shrink-0 me-2 rounded" height="32"
                 preserveAspectRatio="xMidYMid slice" role="img" width="32" xmlns="http://www.w3.org/2000/svg">
                <title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"></rect>
                <text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text>
            </svg>
            <p class="pb-3 mb-0 small lh-sm border-bottom"> <strong class="d-block text-gray-dark">@username</strong>
                This user also gets some representative placeholder content. Maybe they did something interesting,
                and you really want to highlight this in the recent updates.
            </p>
        </div>
        <small class="d-block text-end mt-3"> <a href="#">All updates</a> </small>
    </div>
</main>
<?php $content = ob_get_clean() ?>
