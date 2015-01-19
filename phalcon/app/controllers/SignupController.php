<?php

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        
    }

    public function registerAction()
    {
    	$user = new User();

        //Store and check for errors
        $success = $user->save(
        	$this->request->getPost(), array('name', 'email'));

        if ($success) {
            echo "Thanks for registering!";
        } else {
            echo "Sorry, the following problems were generated: ";

            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

}