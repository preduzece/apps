<?php

class AboutController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("front/about");
    }

}