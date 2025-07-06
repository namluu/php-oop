<?php declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\PostModel;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    public function indexAction(): void
    {
        $postModel = new PostModel();
        $posts = $postModel->getAll();

        View::render('home/index.php', [
            'posts' => $posts
        ]);
    }
}
