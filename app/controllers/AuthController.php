<?php

use JetBrains\PhpStorm\NoReturn;

class AuthController extends Controller
{
    protected User $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login(): void
    {
        $postData = $this->retrievePostData();
        $user = $this->userModel->getUserByAccount($postData['account']);
        if (isset($user['password']) && $user['password'] == $postData['password']) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['is_admin'] = $user['is_admin'];
            $this->redirect('./?url=page/dashboard');
        } else {
            $this->redirect('./?url=page/login&error=1');
        }
    }

    #[NoReturn] public function logout(): void
    {
        session_destroy();
        $this->redirect('./?url=page/login');
        exit();
    }
}