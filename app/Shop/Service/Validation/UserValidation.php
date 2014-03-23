<?php namespace Shop\Service\Validation;

use Crhayes\Validation\ContextualValidator;

class UserValidation extends ContextualValidator
{
    protected $rules = array(
        'email'    => 'required',
        'password' => 'required'  
    );

    protected $messages = array(
        'email.required'    => 'Email is required',
        'password.required' => 'Password is required'
    );
}

