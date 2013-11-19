<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // retrieve and pass all user ids, names and hashes
        $userQuery = UserQuery::create()->find();
        $userArray = array();

        foreach($userQuery as $user) {
            $row = array();
            $row['user-name'] = $user->getUserName();
            $row['user-id'] = $user->getUserId();
            $userArray[] = $row;
        }

        $this->view->assign('userArray', $userArray);
    }

    public function addAction()
    {
        // create blank application form
        $request = $this->getRequest();
        $form    = new Application_Form_User();
 
        // if the form is submitted and the inputs are valid
        // retrieve input data
        // create new user row and populate with input data
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $username = $request->getPost('username');
                $password = $request->getPost('confirmpassword');
                $email = $request->getPost('email');
                $type = $request->getPost('type');
                $salt = base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM));
                $hash = hash('sha256', $salt . $password);

                $new = new User();
                $new->setUserName($username);
                $new->setUserHash($hash);
                $new->setUserSalt($salt);
                $new->setUserEmail($email);
                $new->setUserType($type);
                $new->save();

                echo $username . ' added.';
            }
        }
        $this->view->assign('form', $form);
    }

    public function editAction()
    {
        // prepare form based on selected user
        $request = $this->getRequest();
        $userId = $request->getParam('user_id');
        $form = new Application_Form_User();
 
        // find selected user's details
        $userQuery = UserQuery::create()->findOneByUserId($userId);

        $currentUserName = $userQuery->getUserName();
        $currentUserEmail = $userQuery->getUserEmail();
        $currentUserType = $userQuery->getUserType();

        // populate form with current details
        // remove password and captcha fields
        $form->getElement('username')->setValue($currentUserName);
        $form->getElement('email')->setValue($currentUserEmail);
        $form->getElement('type')->setValue($currentUserType);
        $form->getElement('submit')->setLabel('Edit User');
        $form->removeElement('enterpassword');
        $form->removeElement('confirmpassword');
        $form->removeElement('captcha');

        // if the form is submitted and the inputs are valid
        // retrieve input data
        // edit selected user's row and with input data
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $newUserName = $request->getPost('username');
                $newUserEmail = $request->getPost('email');
                $newUserType = $request->getPost('type');

                $userQuery->setUserName($newUserName);
                $userQuery->setUserEmail($newUserEmail);
                $userQuery->setUserType($newUserType);
                $userQuery->save();

                echo $newUserName . ' amended.';
            }
        }
        $this->view->assign('form', $form);  
    }
}