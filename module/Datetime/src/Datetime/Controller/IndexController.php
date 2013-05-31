<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Datetime for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Datetime\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Datetime\Form\DatetimeForm;
use Datetime\Form\DatetimeFormFilter;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new DatetimeForm(); // name of form
        
        $datetimeFormFilter = new DatetimeFormFilter($form);
    	$form->setInputFilter($datetimeFormFilter->getInputFilter());
		
		$request = $this->getRequest();
		
		if ($request->isPost()) {
			
			// Prepare form for validation
			$form->setData($request->getPost());
			
			if ($form->isValid()) 
			{
				return $this->redirect()->toRoute('index',array('action' => 'confirmation'));	
			}

		}
		
		return array('form' => $form);
    }

    public function confirmationAction()
    {
        return array();
    }
}
