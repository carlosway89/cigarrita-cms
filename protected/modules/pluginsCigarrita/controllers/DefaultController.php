<?php

class DefaultController extends Controller
{	
	public function filters()
    {
            return array(
                    'accessControl', // perform access control for CRUD operations
            );
    }

	public function accessRules()
	{	
		
		return array(
			array('allow',
				'actions'=>array('index'),
				'users'=>array('@')
				),
			array('deny',
					'users'=>array('*'),
				)
			);
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	
}