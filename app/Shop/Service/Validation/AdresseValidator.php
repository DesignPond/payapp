<?php namespace Shop\Service\Validation;

use Crhayes\Validation\ContextualValidator;

class AdresseValidator extends ContextualValidator
{
    protected $rules = array(
	    'default' => [	
			'first_name' => 'required',
			'last_name'  => 'required',
			'email'      => 'required',
			'phone'      => 'required',
			'address'    => 'required',
			'zip'        => 'required',
			'city'       => 'required',
			'country'    => 'required'
		],
        'billing' => [
			'first_name' => 'required',
			'last_name'  => 'required',
			'email'      => 'required',
			'phone'      => 'required',
			'address'    => 'required',
			'zip'        => 'required',
			'city'       => 'required',
			'country'    => 'required'
        ],
        'shipping' => [
			'first_name' => 'required',
			'last_name'  => 'required',
			'address'    => 'required',
			'zip'        => 'required',
			'city'       => 'required',
			'country'    => 'required'
         ]
    );

    protected $messages = array(
		'first_name.required' => 'The field first name is required',
		'last_name.required'  => 'The field last name is required',
		'email.required'      => 'The field email is required',
		'phone.required'      => 'The field phone is required',
		'address.required'    => 'The field address is required',
		'zip.required'        => 'The field zip is required',
		'city.required'       => 'The field city is required',
		'country.required'    => 'The field country is required'
    );
}
