<?php

class ChatWidget extends CWidget
{

    private $ajaxLoader;
    private $closeWinImageUrl;
    private $openWinImageUrl;

	public function init()
	{

        $assetsDir = dirname(__FILE__).'/assets';
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript("jquery");

        $cs->registerScriptFile(
            Yii::app()->assetManager->publish(
                $assetsDir.'/ChatPosition.js'
            ),
            CClientScript::POS_END
        );

        $cs->registerCssFile(
            Yii::app()->assetManager->publish(
                $assetsDir.'/chatRoom.css'
            )
        );

        $this->ajaxLoader = Yii::app()->assetManager->publish(
            $assetsDir.'/ajax-loader.gif'
        );

        $this->closeWinImageUrl = Yii::app()->assetManager->publish(
            $assetsDir.'/closeWin.png'
        );

        $this->openWinImageUrl = Yii::app()->assetManager->publish(
            $assetsDir.'/openWin.png'
        );

        $cs->registerScript('#myScript', "
            $(function() {

                var chat = new ChatPosition();
                chat.init('" . $this->closeWinImageUrl . "', '" . $this->openWinImageUrl . "', 150);
                chat.getPagePos();
                chat.closeChat();

                $('#closeImg').click(function(){
                    chat.changeState();
                });

                $(window).resize(function() {
                    chat.redraw();
                });

            });
        ");


    }



    public function run()
    {
        $this->render("body", array(
                'openWinImageUrl' => $this->openWinImageUrl,
                'ajaxLoader' => $this->ajaxLoader,
           )
        );
    }



}
