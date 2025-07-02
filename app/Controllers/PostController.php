<?php declare(strict_types=1);

namespace App\Controllers;

//use Core\View;
//use App\Models\PostModel;

class PostController
{
    public function indexAction(): void
    {
        echo 'hello from the index action in Posts controller';

//        $posts = PostModel::getAll();
//
//        View::render('Post/index.php', [
//            'posts' => $posts
//        ]);
    }

    public function createAction()
    {
        echo 'hello from the create action in Posts controller';
    }
}