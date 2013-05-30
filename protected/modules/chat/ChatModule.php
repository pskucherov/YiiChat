<?php

class ChatModule extends CWebModule
{

	public function init()
	{
		$this->setImport(array(
			'chat.models.*',
			//'chat.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{

			return true;
		}
		else
			return false;
	}

}
