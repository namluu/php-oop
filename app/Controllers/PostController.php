<?php declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\PostModel;

class PostController extends Controller
{
    public function indexAction(): void
    {
        $postModel = new PostModel();
        $posts = $postModel->getAll();

        View::render('post/index.php', [
            'posts' => $posts
        ]);
    }

    public function createAction()
    {
        echo 'hello from the create action in Posts controller';
    }
}