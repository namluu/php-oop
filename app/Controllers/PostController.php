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
        View::render('post/create.php');
    }

    public function storeAction()
    {
        if ($this->isPostSubmitted()) {
            $data = $this->getSanitizedData();
            if (!$this->validateFormData($data)) {
                $this->responseError('Invalid input');
            }

            $postModel = new PostModel();
            $result = $postModel->create($data);
            if ($result) {
                //$this->responseSuccess('Post created successfully');
                $this->redirect(ROOT_URL . 'post');
            } else {
                //$this->responseError('Failed to create a new post', 500);
                $this->redirect(ROOT_URL . 'post/create');
            }
        }
    }

    /**
     * Basic validation
     *
     * @param $data
     * @return bool
     */
    private function validateFormData($data): bool
    {
        return !(!$data['title'] || !$data['content']);
    }
}