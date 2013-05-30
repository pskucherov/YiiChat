<?php

class ChatWidget extends CWidget
{

    /**
     * @string Address of the gif image (ajaxLoader)
     */
    private $ajaxLoader;


    /**
     * @string Address of the image that closes the window.
     */
    private $closeWinImageUrl;

    /**
     * @string Address of the image that opens the window.
     */
    private $openWinImageUrl;

    public function init()
	{

        $assetsDir = dirname(__FILE__).'/assets';
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript("jquery");

        $cs->registerScriptFile(
            Yii::app()->assetManager->publish(
                $assetsDir.'/jquery.scrollTo-min.js'
            ),
            CClientScript::POS_END
        );


        /**
         * Sets chat on position. Opens and closes the window.
         */
        $cs->registerScriptFile(
            Yii::app()->assetManager->publish(
                $assetsDir.'/ChatPosition.js'
            ),
            CClientScript::POS_END
        );

        /**
         * Css for chat
         */
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


        /**
         * Use ChatPosition.js and get messages by ajax.
         */
        $cs->registerScript('#myScript', "

            var intervalId = null;
            var lastGetId = 0;

            function getLastMessages(num) {
                $.post('" . CHtml::normalizeUrl(array('chat/chatRoom/show')) . "',
                    { num: num }, function(data) {
                    $('#ajaxLoader').css('display', 'none');
                    $('#chat-messages').html(data.text);
                    if ( data.lastId ) {
                        lastGetId = data.lastId;
                        $('#chat-messages').scrollTo('100%');
                    }
                }, 'json');
            }

            function getNewMessages() {
                $.post('" . CHtml::normalizeUrl(array('chat/chatRoom/show')) . "',
                    { lastId: lastGetId }, function(data) {
                    $('#chat-messages').append(data.text);
                    if ( data.lastId ) {
                        lastGetId = data.lastId;
                        $('#chat-messages').scrollTo('100%');
                    }
                }, 'json');
            }

            var chat = new ChatPosition();
            chat.init('" . $this->closeWinImageUrl . "',
                '" . $this->openWinImageUrl . "', 150);

            chat.getPagePos();
            chat.closeChat();

            $('#closeImg').click(function(){
                if ( intervalId === null ) {
                    getLastMessages(15);
                    intervalId = setInterval(function(){
                       getNewMessages();
                    }, 5000);
                }
                chat.changeState();
            });

            $(window).resize(function() {
                chat.redraw();
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
