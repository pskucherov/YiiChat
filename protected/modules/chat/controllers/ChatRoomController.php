<?php

class ChatRoomController extends Controller
{

    public function actionIndex()
	{
		$this->render('index', array(
            'closeWInImageUrl' => ChatModule::$closeWInImageUrl
            )
        );
	}

}