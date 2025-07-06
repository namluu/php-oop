<?php declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\PostModel;
use Core\Message;

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
        if (!$this->getUserSession()) {
            $this->redirect(ROOT_URL . 'user/login');
        }

        View::render('post/create.php');
    }

    public function storeAction()
    {
        if (!$this->getUserSession()) {
            $this->redirect(ROOT_URL . 'user/login');
        }

        if ($this->isPostSubmitted()) {
            $data = $this->getSanitizedData();
            if (!$this->validateFormData($data)) {
                Message::setErrorMessage('Invalid input');
                $this->redirect(ROOT_URL . 'post/create');
            }

            $postModel = new PostModel();
            $user = $this->getUserSession();
            $data['user_id'] = $user->id;
            if ($postModel->create($data)) {
                Message::setSuccessMessage('Post created');
                $this->redirect(ROOT_URL . 'post');
            } else {
                Message::setErrorMessage('Post could not be created');
                $this->redirect(ROOT_URL . 'post/create');
            }
        }

        $this->redirect(ROOT_URL . 'post/create');
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