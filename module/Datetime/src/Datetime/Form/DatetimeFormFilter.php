<?php
namespace Datetime\Form;

use Zend\InputFilter\Factory as InputFactory;  
use Zend\InputFilter\InputFilter;              
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 
use Datetime\Form\DatetimeForm;
use DateInterval;
use DateTime;

class DatetimeFormFilter implements InputFilterAwareInterface
{
	
	protected $inputFilter;
	protected $datetimeForm;
	
	public function __construct(DatetimeForm $form)
	{
		$this->datetimeForm = $form;
	}
	
	// Add content to this method:
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}

	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
			$factory     = new InputFactory();
			
			
			$inputFilter->add($factory->createInput(array(
				'name'     => 'appointment-date',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
				),
				'validators' => array(
					array(
						'name' => 'DateStep',
						'options' => array(
							'step' 	 => new DateInterval("P2D"),
							'baseValue' => new DateTime(),
						    'format' => 'Y-m-d',
				    		'messages' => array(
				    				\Zend\Validator\DateStep::NOT_STEP => 'Must be a day in the future',
				    		),
						),
					),
				),
			)));
			
			
		$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}
}