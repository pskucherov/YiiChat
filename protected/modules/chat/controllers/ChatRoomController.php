<?php

class ChatRoomController extends Controller
{

    public function actionShow()
    {
        if(!Yii::app()->request->isAjaxRequest)
        {
            throw new CHttpException(404);
        } else {
            $criteria = new CDbCriteria();
            $criteria->order = 't.id DESC';

            if (isset($_POST['num'])) {
                $criteria->limit = intval($_POST['num']);
            }

            if (isset($_POST['lastId'])) {
                $criteria->addCondition('t.id > ' . intval($_POST['lastId']));
            }

            $messages = Chat::model()->with('author')->findAll($criteria);


            $arr = array();
            $buf = array();
            $arr['text'] = '';

            foreach($messages as $message) {
                if ( !isset($arr['lastId']) ) {
                    $arr['lastId'] = $message->id;
                }
                if ( !$message->author->id ) {
                    $author = "Guest";
                } else {
                    $author = $message->author->username;
                }
                $dateTime = date("H:i n/j/Y", $message->create_time);
                $buf[] = "<b>" . $author . " [" . $dateTime . "]</b><BR>" . $message->text . "<BR>";
            }

            for ( $i = count($buf)-1; $i >= 0; $i-- ) {
                $arr['text'] .= $buf[$i];
            }

            echo CJSON::encode($arr);
        }

    }


    public function actionPost()
	{

        if(!Yii::app()->request->isAjaxRequest) 
        {
            throw new CHttpException(404);
        } else {
            $arr = array();

            if (isset($_POST['chattext'])) {
                $_POST['chattext'] = trim($_POST['chattext']);
                if ( !empty($_POST['chattext']) && mb_strlen($_POST['chattext']) <= 100 )
                {
                    $arr['result'] = 'success';
                    $arr['text']   = htmlspecialchars($_POST['chattext']);

                    $model = new Chat();
                    $model->text        = $arr['text'];
                    $model->create_time = time();

                    $dateTime = date("H:i n/j/Y", $model->create_time);

                    if ( Yii::app()->user->isGuest ) {
                        $model->author_id = 0;
                        $arr['text'] = "<b>Guest [" . $dateTime . "]</b><BR>" . $arr['text'];
                    } else {
                        $model->author_id = Yii::app()->user->getId();
                        $arr['text'] = "<b>" . Yii::app()->user->getName() . " [" . $dateTime . "]</b><BR>" . $arr['text'];
                    }
                    $model->save();
                }

            }
            else
            {
                $arr['result'] = 'fail';
            }
    
            echo CJSON::encode($arr);
                
        }

	}

}