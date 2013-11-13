<?php

class Application_Form_Product extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

/*        $notEmpty = new Zend_Validate_NotEmpty();
        $notEmpty->setMessage('The field cannot be empty!');*/

        // Add the username element
        $this->addElement('text', 'username', array(
            'label'      => 'Enter username (max 20 characters):',
            'required'   => true,
            'value'      => 'username',
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));

        // Add the password element
        $this->addElement('password', 'enterpassword', array(
            'label'      => 'Enter password (min 6 characters):',
            'required'   => true,
            'value'      => 'username',
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array('min'=> 6))
                )
        ));

        $this->addElement('password', 'confirmpassword', array(
            'label'      => 'Confirm password (min 6 characters):',
            'required'   => true,
            'value'      => 'username',
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array('min'=>6)),
                array('validator' => 'Identical', 'options' => array('token' => 'enterpassword'))
                )
        ));

        // Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Enter email address:',
            'required'   => true,
            'value'      => 'username@website.com',
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));
 
        // Add a user type element
        $this->addElement('radio', 'radio', array(
            'label' => 'Select user type:',
            'required' => true,
            'value'      => 'standard',
            'multiOptions'=>array(
                'admin' => 'Administrator',
                'standard' => 'Standard',
            ),
        ));

        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'       => 'Enter the 5 letters displayed below (not case sensitive):',
            'required'    => true,
            'captcha'     => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Add Product',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}

