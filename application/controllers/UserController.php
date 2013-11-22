<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {

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
        $form = new Application_Form_User();
 
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

                $findUser = UserQuery::create()->findOneByUserName($username);
                if ($findUser) {
                    $this->view->assign('userName', $username);
                    $this->view->assign('status', 'exists');
                }
                else {
                    $newUser = new User();
                    $newUser->setUserName($username);
                    $newUser->setUserHash($hash);
                    $newUser->setUserSalt($salt);
                    $newUser->setUserEmail($email);
                    $newUser->setUserType($type);
                    $newUser->save();

                    $this->view->assign('userName', $username);
                    $this->view->assign('status', 'added');
                }
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
                $findUser = UserQuery::create()->findOneByUserName($newUserName);
                if ($findUser) {
                    $this->view->assign('userName', $newUserName);
                    $this->view->assign('status', 'exists');
                }
                else {
                    $newUserEmail = $request->getPost('email');
                    $newUserType = $request->getPost('type');

                    $userQuery->setUserName($newUserName);
                    $userQuery->setUserEmail($newUserEmail);
                    $userQuery->setUserType($newUserType);
                    $userQuery->save();
                    $_SESSION['user']=$newUserName;
                    $this->view->assign('userName', $newUserName);
                    $this->view->assign('status', 'amended');
                }
            }
        }
        $this->view->assign('form', $form);  
    }

    public function deleteAction()
    {
        // prepare form based on selected user
        $request = $this->getRequest();
        $userId = $request->getParam('user_id');
        $form = new Application_Form_DeleteUser();
 
        // find selected user's details
        $userQuery = UserQuery::create()->findOneByUserId($userId);

        $userName = $userQuery->getUserName();
        $this->view->assign('userName', $userName);  

        // if the form is submitted and valid delete users row
        // and if the user deleted their own account destroy session
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                if($_SESSION['user'] == $userName) {
                    session_destroy();
                }
                $userQuery->delete();
                $this->view->assign('deleted', $userName);
            }
        }
        $this->view->assign('form', $form); 
    }

    public function loginAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_User();

        // remove everything except username and password
        $form->getElement('username')->setLabel('Enter username:')->setValue('');
        $form->getElement('enterpassword')->setLabel('Enter password:');
        $form->getElement('submit')->setLabel('Log in');
        $form->removeElement('confirmpassword');
        $form->removeElement('captcha');
        $form->removeElement('type');
        $form->removeElement('email');

        // if the form is submitted and the inputs are valid
        // compare attempted hash with actual hash
        // print message accordingly
        // and create new session if successful
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $username = $request->getPost('username');
                $password = $request->getPost('enterpassword');

                $findUser = UserQuery::create()->findOneByUserName($username);

                // if user name exists
                if ($findUser) {
                    $salt = $findUser->getUserSalt();
                    $actualHash = $findUser->getUserHash();

                    $attemptedHash = hash('sha256', $salt . $password);
                    // correct username and password
                    if ($actualHash === $attemptedHash) {
                        $this->view->assign('success', '');
                        session_destroy();
                        session_start();
                        // store session data
                        $_SESSION['user']=$username;
                    }
                    // incorrect password
                    else {
                        $this->view->assign('failure', '');
                    }
                }
                // incorrect username
                else {
                    $this->view->assign('failure', '');
                }
            }
        }
        $this->view->assign('form', $form);  
    }
}
