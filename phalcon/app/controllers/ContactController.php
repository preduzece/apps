<?php

class ContactController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("front/contact");
    }

    public function registerAction()
    {
    	$contact = new Message();

        //Store and check for errors
        $success = $contact->save(
        	$this->request->getPost(), array(
        		'name', 'email', 'gender', 'text'));

        if ($success) {

    		$this->view->setVar("status", "Message sent!");
            $this->view->pick("front/contact");
        } else {

        	$status = '';

        	foreach ($contact->getMessages() as $error) {
				$status .= $error->getMessage(). "<br/>";
			}

    		$this->view->setVar("status", $status);
            $this->view->pick("front/contact");

        }
    }

}