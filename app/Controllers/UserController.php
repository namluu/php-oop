<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use Core\Controller;
use Core\View;
use Core\Message;

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
        if (!$this->getUserSession()) {
            $this->redirect(ROOT_URL . 'user/login');
        }

        $user = $this->getUserSession();
        View::render('user/account.php', [
            'user' => $user
        ]);
    }

    public function registerSubmitAction(): void
    {
        if ($this->isPostSubmitted()) {
            $data = $this->getSanitizedData();
            if (!$this->validateFormData($data)) {
                Message::setErrorMessage('Invalid input');
                $this->redirect(ROOT_URL . 'user/register');
            }

            $userModel = new UserModel();
            if ($userModel->create($data)) {
                Message::setSuccessMessage('User created');
                $this->redirect(ROOT_URL . 'user/login');
            } else {
                Message::setErrorMessage('User could not be created');
                $this->redirect(ROOT_URL . 'user/register');
            }
        }

        $this->redirect(ROOT_URL . 'user/register');
    }

    private function validateFormData($data): bool
    {
        return !(!$data['email'] || !$data['password']);
    }

    public function loginSubmitAction(): void
    {
        if ($this->isPostSubmitted()) {
            $data = $this->getSanitizedData();
            if (!$this->validateFormData($data)) {
                Message::setErrorMessage('Invalid input');
                $this->redirect(ROOT_URL . 'user/login');
            }

            $userModel = new UserModel();
            if ($user = $userModel->login($data)) {
                $this->createUserSession($user);
                Message::setSuccessMessage('User logged in');
                $this->redirect(ROOT_URL . 'user/account');
            } else {
                Message::setErrorMessage('User could not be logged in');
                $this->redirect(ROOT_URL . 'user/login');
            }
        }

        $this->redirect(ROOT_URL . 'user/login');
    }

    public function logoutAction(): void
    {
        $this->removeUserSession();
        Message::setSuccessMessage('User logged out');
        $this->redirect(ROOT_URL);
    }
}
