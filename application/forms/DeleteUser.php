<?php

class Application_Form_DeleteUser extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Yes',
        ));
 
        // Add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}