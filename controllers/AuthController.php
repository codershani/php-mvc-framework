<?php

namespace app\controllers;
use app\core\Application;
use app\core\controller;
use app\core\middlewares\AuthMiddlewares;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\user;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddlewares(['admin']));
    }

    public function login(Request $request, Response $response)
    {

        echo '<pre>';
        var_dump($request->getRouteParams());
        echo '</pre>';

        $loginForm = new LoginForm();
        if($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/admin');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('frontend/login', [
            'model' => $loginForm
        ]);
    }
    
    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost()) {
            $user->loadData($request->getBody());

            if($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/login');
            }

            return $this->render('frontend/register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('frontend/register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function admin()
    {
        $this->setLayout('admin');
        return $this->render('admin/admin');
    }

}