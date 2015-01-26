<?php

class ContactController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("front/contact");
    }

}