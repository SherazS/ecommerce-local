<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $criteria = new Criteria();
        $criteria->setLimit(10);

        $select  = UserPeer::doSelect($criteria);

        $userArray = array();

        foreach($select as $value) {
            $row = array();
            $row['ID'] = $value->getUserId();
            $row['Username'] = $value->getUserName();
            $row['Hash'] = $value->getUserHash();
            $userArray[] = $row;
        }

        $this->view->assign('userArray', $userArray);
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_User();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $username = $this->getRequest()->getPost('username');
                $password = $this->getRequest()->getPost('confirmpassword');
                $email = $this->getRequest()->getPost('email');
                $type = $this->getRequest()->getPost('type');
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
 
        $this->view->form = $form;
    }
}