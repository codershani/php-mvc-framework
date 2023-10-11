<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddlewares;
use app\core\Request;
use app\core\Response;
use app\models\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddlewares(['project', 'upload']));
    }

    public function index()
    {
        $project = new Project();

        $this->setLayout('main');
        
        return $this->render('frontend/project', [
            'model' => $project
        ]);
    }

    public function project()
    {
        $project = new Project();
        
        $this->setLayout('admin');
        return $this->render('admin/project', [
            'model' => $project
        ]); 
    }

    public function upload(Request $request, Response $response)
    {
        $project = new Project();
        if($request->isPost()) {
            $project->loadData($request->getBody());
            if($project->validate() && $project->create()) {
                Application::$app->session->setFlash('success', 'Video Uploaded');
                $response->redirect('/admin/project');
            }
        }
        
        $this->setLayout('admin');
        return $this->render('admin/projectUpload', [
            'model' => $project
        ]); 
    }
}