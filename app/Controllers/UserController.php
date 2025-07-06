<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use Core\Controller;
use Core\View;

class UserController extends Controller
{
    public function indexAction(): void
    {
        echo 'User controller - indexAction';
    }

    public function registerAction(): void
    {
        View::render('user/register.php');
    }

    public function loginAction(): void
    {
        View::render('user/login.php');
    }

    public function accountAction(): void
    {
        $user = $this->getUserSession();
        View::render('user/account.php', [
            'user' => $user
        ]);
    }

    public function storeAction(): void
    {
        if ($this->isPostSubmitted()) {
            $data = $this->getSanitizedData();
            if (!$this->validateFormData($data)) {
                $this->responseError('Invalid input');
            }

            $userModel = new UserModel();
            if ($userModel->create($data)) {
                $this->redirect(ROOT_URL . 'user/login');
            } else {
                $this->redirect(ROOT_URL . 'user/register');
            }
        }

        $this->redirect(ROOT_URL . 'user/register');
    }

    private function validateFormData($data): bool
    {
        return !(!$data['email'] || !$data['password']);
    }

    public function authAction(): void
    {
        if ($this->isPostSubmitted()) {
            $data = $this->getSanitizedData();
            if (!$this->validateFormData($data)) {
                $this->responseError('Invalid input');
            }

            $userModel = new UserModel();
            if ($user = $userModel->login($data)) {
                $this->createUserSession($user);
                $this->redirect(ROOT_URL . 'user/account');
            } else {
                $this->redirect(ROOT_URL . 'user/login');
            }
        }

        $this->redirect(ROOT_URL . 'user/login');
    }

    public function logoutAction(): void
    {
        $this->removeUserSession();
        $this->redirect(ROOT_URL);
    }
}
