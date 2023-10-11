<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;
use app\models\Project;

/**
 * Summary of SiteController
 * @author CoderShani
 * @package app\controllers
 * @copyright (c) 2023
 */
class SiteController extends Controller
{

    /**
     * Summary of home
     * @return array|string
     */
    public function home()
    {
        $params = [
            "name" => "CoderShani",
        ];

        return $this->render('frontend/home', $params);
    }

    /**
     * Summary of contact
     * @return array|string
     */
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if($request->isPost()) {
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us. We\'ll be get back to you soon.');
                $response->redirect('/contact');
            }
        }
        return $this->render('frontend/contact', [
            'model' => $contact
        ]);
    }

}