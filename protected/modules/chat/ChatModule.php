<?php

class ChatModule extends CWebModule
{
    public $loadingImageUrl;
    public static $closeWInImageUrl;

	public function init()
	{

		$this->setImport(array(
			'chat.models.*',
			//'chat.components.*',
		));

        $assetsDir = dirname(__FILE__).'/assets';
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript("jquery");

        /*
        $cs->registerScriptFile(
            Yii::app()->assetManager->publish(
                $assetsDir.'/facebook_events.js'
            ),
            CClientScript::POS_END
        );
        */
        $cs->registerCssFile(
            Yii::app()->assetManager->publish(
                $assetsDir.'/chatRoom.css'
            )
        );



        $this->loadingImageUrl = Yii::app()->assetManager->publish(
            $assetsDir.'/ajax-loader.gif'
        );

         self::$closeWInImageUrl = Yii::app()->assetManager->publish(
            $assetsDir.'/closeWin.png'
         );

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
