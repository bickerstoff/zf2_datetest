<?php
namespace Datetime\Form;

use Zend\Form\Form;

class DatetimeForm extends Form
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('datetime');
		
		$this->setPreferFormInputFilter(true);
		
		$this->setAttribute('method', 'post');
		
		$this->add(array(
		     'type' => 'Zend\Form\Element\Date',
		     'name' => 'appointment-date',
		     'options' => array(
		             'label' => 'Appointment Date',
		             'format' => 'Y-m-d'
		     ),
		     'attributes' => array(
		             'min' => date('Y-m-d'), // today's date
		             'max' => '2020-01-01',
		             'step' => '1', // days; default step interval is 1 day
		     )
		 ));
		
		
		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type' 	=> 'submit',
				'value' => 'Submit',
				'id' 	=> 'submitbutton',
				'class' => 'btn',
			),
		));
	}
}